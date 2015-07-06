<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('contato');
	}
        
        public function store(Request $request){
            $nome = $request->input('nome');
            $email = $request->input('email');
            $mensagem = $request->input('mensagem');            
        }
        
        public function sendMail(Request $request){
            $this->validate($request, [
                'nome'     => 'required|string|min:1',
                'email'    => 'required|email',
                'mensagem' => 'required|min:10'
            ]);            
            
            $nome = $request->input('nome');
            $email = $request->input('email');
            $mensagem = $request->input('mensagem');
            
            Mail::raw($mensagem, function($message) use($email, $nome)
            {
                $message->from($email, $nome);
                $message->to('diego.dias@dfdias.com.br')->subject('Contato do site - '.$email);
            });
            
            return redirect('/contato')->with('mensagem', 'Solicitação de contato enviada com sucesso.');
        }
        


}
