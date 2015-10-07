<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;


class IndexController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Teste Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests.
	|
	*/
    
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
           /* $log = $this->createLog('C:\\teste.txt');
            $log->send("First");
            $log->send("Second");
            $log->send("Third");*/
	}

        private function createLog($file) {
            $f = fopen($file, 'a');
            
            
            while (true) {
                $line = yield;
                fwrite($f, $line);
            }
        }
      

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            return view('index');
	}

}
