<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class PasswordController extends Controller {

    
        protected $redirectTo = '/login';
    
	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
        
	/**
	 * Reset the given user's password.
	 *
         * Método sobrescrito para adaptar o nome do campo original 'password' para o nome 'senha'.
         * 
	 * @param  Request  $request
	 * @return Response
	 */
	public function postReset(Request $request)
	{
                               
		$this->validate($request, [
			'token' => 'required',
			'email' => 'required',
			'password' => 'required|confirmed',
		]);

		$credentials = $request->only(
			'email', 'password', 'password_confirmation',  'token'
		);

		$response = $this->passwords->reset($credentials, function($user, $password)
		{
                        // Necessário alterar para que o sistema de mudança de senha funcione.
			$user->senha = bcrypt($password);

			$user->save();

			$this->auth->login($user);
		});
                
		switch ($response)
		{
			case PasswordBroker::PASSWORD_RESET:
				return redirect($this->redirectPath());

			default:
				return redirect()->back()
							->withInput($request->only('email'))
							->withErrors(['email' => trans($response)]);
		}
	}

}
