<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class SobreController extends BaseController {

	public function __construct()
	{
            //
	}
                
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            return view('sobre');
	}

}
