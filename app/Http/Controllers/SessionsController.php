<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;
use Session, Sentinel;

class SessionsController extends Controller
{
    public function login()
    {
    	if ($user = Sentinel::check()) {
    		Session::flash('notice', "You has logged in ".$user->first_name);
    		return redirect('/');
    	}else{
    		return view('auth.login');
    	}
    }

    public function loginStore(SessionRequest $request)
    {
    	if ($user = Sentinel::authenticate($request->all())) {
    		Session::flash('notice', "Welcome, ".$user->first_name." ".$user->last_name);
    		return redirect()->intended('/home');
    	}else{
    		Session::flash('error', "Email Or Password input wrong");
    		return view('auth.login');
    	}
    }

    public function logout()
    {
    	Sentinel::logout();
    	Session::flash('notice', "You're Logged Out");
    	return redirect('/');
    }
}
