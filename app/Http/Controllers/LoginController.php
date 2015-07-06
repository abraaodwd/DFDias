<?php namespace App\Http\Controllers;

use Auth;
use App\Models\Tbl_autores;
use Illuminate\Http\Request;

class LoginController extends Controller{

        protected $autor;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Tbl_autores $autor)
	{
                $this->autor = $autor;
		$this->middleware('autenticar');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            //$url = action('IndexController@index');

            /*$users = $this->user->all()->where('name', $nome);
            foreach($users as $u){
               echo $u->name;
            }*/

            $autores = $this->autor->all();

            return view('admin',['autores' => $autores]);
	}
        
        public function formCadastro(){
            return view('autores.cadastrar');
        }
        
        public function logout(){
            Auth::logout();
            return redirect('/');
        }
        
        public function edit($id){
            $autor = $this->autor->find($id);
            return view('autores.editar', ['autor' => $autor]);
        }
        
        public function update(Request $request){
            
            $this->validate($request, [
                'nome'      => 'required|max:100',
                'email'     => 'required|max:255|email',
                'idade'     => 'required|integer|max:120',
                'sexo'      => 'in:M,F',
                'id_autor'  => 'required|integer|max:9999',
            ]);

            $autor = $this->autor->find($request->input('id_autor'));   
            $autor->update($request->only('nome', 'email', 'idade', 'sexo'));
            
            return redirect('/login')->with('mensagem', 'Autor '.$request->input('nome'). ' alterado com sucesso');
            
        }
        
        public function destroy($id){
            $autor = $this->autor->find($id, ['nome']);
            $this->autor->destroy($id);
            return redirect('/login')->with('mensagem', 'Autor '.$autor->nome. ' removido com sucesso');;
        }
        
        public function store(Request $request){
            $this->validate($request, [
                'nome'      => 'required|max:100',
                'email'     => 'required|max:255|email',
                'idade'     => 'required|integer|max:120',
                'senha'     => 'required',
                'sexo'      => 'in:M,F',
            ]);
                        
            
            $autor = $this->autor;
            
            $teste = $autor->all(['email'])->where('email', $request->input('email'));

            if(!$teste->isEmpty()){                
              return redirect('/cadastro')->with('mensagem', 'O e-mail informado já está cadastrado')->withInput($request->except('senha'));  
            }
                
            
            $autor->nome  = $request->input('nome');
            $autor->email = $request->input('email');
            $autor->idade = $request->input('idade');
            $autor->sexo  = $request->input('sexo');
            $autor->save();
  
       
            return redirect('/cadastro')->with('mensagem', 'Autor '.$request->input('nome').' cadastrado com sucesso');
            
        }
      
}