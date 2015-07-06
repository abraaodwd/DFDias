<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Validation\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {

    protected $request;
    
    function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */    
    
    public function authenticate()
    {
        $this->validate($this->request, [
            'email' => 'required|max:255',
            'senha' => 'required',
        ]);
        
        if (Auth::attempt(['email' => $this->request->input('email'), 'password' => $this->request->input('senha')]))
        {  
            return redirect()->intended('login');
        } else {
            return redirect()->back()->withErrors(['Não foi possível autenticá-lo. Revise os dados informados.']);
        }
         
    }
    
    // Atualizações Laravel 5.1 - validator e create aqui
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator

    public function validator(array $data)
    {
            return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
            ]);
    }
    */
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User

    public function create(array $data)
    {
            return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
            ]);
    }    
    */
    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

}
