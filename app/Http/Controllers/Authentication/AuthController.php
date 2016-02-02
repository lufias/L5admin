<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\L5Admin\repositories\authentication\UserAuthenticationInterface;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

	protected $authentication;

	public function __construct(UserAuthenticationInterface $authentication){
        $this->middleware('guest', array('except'=>'logout'));
		$this->authentication = $authentication;
	}

    public function login(){
    	// show login page
    	return view('authentication.login');
    }

    public function authenticate(\App\Http\Requests\LoginRequest $request){

        // verify and login the user
    	try{
    		
            $this->authentication->authenticate($request->get('email'), $request->get('password'));

            // upon success, set some data into the session            
            $request->session()->put('full_name', \Auth::User()->full_name);

    	}
    	catch(\ModelNotFoundException $error){
    		$request->session()->flash('error', 'User Not Found');
    		return back()->withInput();

    	}
    	catch(\PasswordCheckException $error){
    		$request->session()->flash('error', 'Incorrect Password');
    		return back()->withInput();
    	}

        return redirect()->route('home');
    }

    public function logout(Request $request){       
        \Auth::logout();
        return redirect()->route('admin.auth.login');
    }
}
