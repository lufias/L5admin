<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\L5Admin\repositories\users\UserInterface;

class UserConfigController extends Controller
{

	protected $user;

    public function __construct(UserInterface $user){
    	$this->middleware('auth');
    	$this->user = $user;
    }

    public function index(){
    	return view('user.config');
    }

    public function updatePassword(\App\Http\Requests\UpdatePasswordRequest $request){
    	$this->user->updatePassword($request->get('password'));

    	// flash successfull message
        $request->session()->flash('success', 'Successfully update password');

        // return back to previous
        return redirect()->route('home');
    }
}
