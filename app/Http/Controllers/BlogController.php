<?php namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Models\Tbl_artigos;
use App\Models\Tbl_categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Gate;

class BlogController extends Controller {

        protected $artigos, $categorias;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Tbl_artigos $artigos, Tbl_categorias $categorias)
	{
            $this->artigos    = $artigos;
            $this->categorias = $categorias;
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return View
	 */
	public function index()
	{
            //DB::connection()->enableQueryLog();
            //$artigos = $this->artigos->take(10)->orderby('dt_criacao')->get();
            $artigos = $this->artigos->orderby('dt_criacao', 'desc')->paginate(10);
            //dd(DB::getQueryLog());
            
            return view( 'blog.index', ['artigos' => $artigos] )->nest( 'sidebar', 'blog.sidebar');
	}

        public function index_json(){
            $artigos = $this->artigos;
            return $artigos->all()->toJson();
        }

        public function indexPorCategoria($id_categoria){
            $artigos = $this->artigos->where('id_categoria', '=', $id_categoria)
                                     ->orderby('dt_criacao', 'desc')
                                     ->paginate(10);


            return view( 'blog.index', ['artigos' => $artigos] )->nest( 'sidebar', 'blog.sidebar');
        }

        public function indexPorMesAno($mes, $ano){
            $artigos = $this->artigos->whereRaw('month(dt_criacao) = ? and year(dt_criacao) = ?', [$mes, $ano])
                                     ->orderby('dt_criacao', 'desc')
                                     ->paginate(10);


            return view( 'blog.index', ['artigos' => $artigos] )->nest( 'sidebar', 'blog.sidebar');
        }

        public function show($id){
            $artigo     = $this->artigos->find($id);
            return view('blog.post', ['artigo' => $artigo])->nest( 'sidebar', 'blog.sidebar');
        }

        private function sidebar(){
            $categorias = $this->categorias->all()->all();
            return $categorias;
        }

        public function lista(){
            $artigos = $this->artigos->orderby('dt_alteracao', 'desc')->paginate(10);
            
            return view('blog.lista', ['artigos' => $artigos]);
        }

        public function newArticleForm(){
            $user = Auth::user();
            $categorias = $this->categorias->all();
            return view('blog.novoartigo', ['categorias' => $categorias, 'id_autor' => $user->id_autor]);
        }

        public function edit($id_artigo){
            $artigo = $this->artigos->find($id_artigo);

            if(Gate::denies('update-post', $artigo)){
                return redirect()->back()->with('mensagem', 'Você não pode alterar o artigo "'. $artigo->titulo.'"');
            }

            $categorias = $this->categorias->all();
            return view('blog.atualizarartigo', ['artigo'     => $artigo,
                                                 'categorias' => $categorias]);
        }

        public function update(Request $request){

           $v = Validator::make($request->all(), [
                'id_artigo'    => 'required|integer',
                'id_autor'     => 'required|integer',
                'id_categoria' => 'required|integer',
                'titulo'       => 'required|min:10|max:200',
                'subtitulo'    => 'required|min:20|max:400',
                'img_capa'     => 'image',
                'texto'        => 'required',
            ] , ['img_capa.image' => 'É necessário inserir uma imagem para a capa']);

            if ($v->fails())
            {
                return redirect()->back()->withErrors($v->errors())->withInput($request->all());
            }

            $artigos = $this->artigos->find( $request->input('id_artigo') );

            if( !empty($request->file('img_capa') ) ){
                $timestamp = new \DateTime();
                $filename = 'blog_img_'.$timestamp->getTimestamp().".".$request->file('img_capa')->guessExtension();

                $request->file('img_capa')->move(public_path().'/img/blog', $filename);

                $artigos->update( ['img_capa' => $filename] );
            }

            $artigos->update( $request->only( 'id_autor', 'id_categoria', 'titulo', 'subtitulo', 'texto' ) );

            return redirect()->back()->with('mensagem', 'Artigo '.$request->input('titulo'). ' alterado com sucesso');

        }

        public function destroy($id_artigo){
            $artigo = $this->artigos->find($id_artigo, ['titulo']);

            if(Gate::denies('update-post', $artigo)){
                return redirect()->back()->with('mensagem', 'Você não pode remover o artigo "'. $artigo->titulo.'"');
            }

            $this->artigos->destroy($id_artigo);
            return redirect()->back()->with('mensagem', 'Artigo '.$artigo->titulo. ' removido com sucesso');;
        }

        public function store(Request $request){

            /*
            $this->validate($request, [
                'titulo'    => 'required|min:10|max:200',
                'subtitulo' => 'required|min:20|max:400',
                'img_capa'  => 'required|image',
                'texto'     => 'required',
            ]);
            */

           $v = Validator::make($request->all(), [
                'id_autor'     => 'required|integer',
                'id_categoria' => 'required|integer',
                'titulo'       => 'required|min:10|max:200',
                'subtitulo'    => 'required|min:20|max:400',
                'img_capa'     => 'required|image',
                'texto'        => 'required',
            ] , ['img_capa.required' => 'É necessário inserir uma imagem para a capa']);

            if ($v->fails())
            {
                return redirect()->back()->withErrors($v->errors())->withInput($request->all());
            }

            $artigo = $this->artigos;
            $timestamp = new \DateTime();
            $filename = 'blog_img_'.$timestamp->getTimestamp().".".$request->file('img_capa')->guessExtension();

            $request->file('img_capa')->move(public_path().'/img/blog', $filename);

            $artigo->id_autor     = $request->input('id_autor');
            $artigo->id_categoria = $request->input('id_categoria');
            $artigo->titulo       = $request->input('titulo');
            $artigo->subtitulo    = $request->input('subtitulo');
            $artigo->img_capa     = $filename;
            $artigo->texto        = $request->input('texto');

            $artigo->save();

            return redirect('/blog/novoartigo')->with('mensagem', 'Artigo "'.$request->input('titulo').'" cadastrado com sucesso');
        }

}
