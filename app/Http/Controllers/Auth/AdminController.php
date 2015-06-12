<?php namespace App\Http\Controllers;

class AdminController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *Controller for admin user
	 * @return Response
	 */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
	public function index()
	{
        return view('admin.index');
	}
    public function test(){
        echo '223';exit;
    }
}
