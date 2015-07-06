<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Autenticar {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
            if ($this->auth->guest()) // Se funcionário não está autenticado...
            { 
                    if ($request->ajax()) // Se for requisição AJAX, responde erro.
                    {
                            return response('Unauthorized.', 401);
                    }
                    else // Senão redireciona para formulário de login
                    {      
                            return redirect()->guest('auth/login');
                    }

            }

            return $next($request);
	}

}
