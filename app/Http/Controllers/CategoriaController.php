<?php namespace App\Http\Controllers;

use App\Models\Tbl_categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller {
    
    protected $categorias;
    
    public function __construct(Tbl_categorias $categorias)
    {
        $this->categorias = $categorias;
        $this->middleware('autenticar');
    }

    public function index()
    {   
        $categorias = $this->categorias->all();
        return view('categoria.lista', ['categorias' => $categorias]);
    }    
    
    public function edit($id_categoria){
       $categoria = $this->categorias->find($id_categoria);
       return view('categoria.editar', ['categoria' => $categoria]);
    }
    
    public function update(Request $request){
        $this->validate($request, [
            'id_categoria' => 'required|integer',
            'nome'         => 'required'
        ]); 
        
       $categoria = $this->categorias->find($request->input('id_categoria'));
       $categoria->nome = $request->input('nome');
       $categoria->save();
       
       return redirect()->back()->with('mensagem', 'Categoria "'.$request->input('nome').'" alterada com sucesso');
    }
    
    
}
