<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Session, Sentinel;

class UsersController extends Controller
{
    public function signup()
    {
    	return view('auth.register');
    }

    public function store(UserRequest $request)
    {
    	$cons = Request::input('noname');

    	$input = [
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'email' => $request->email,
    		'password' => $request->password
    	];
        $user = Sentinel::findRoleByName('User');
        $admin = Sentinel::findRoleByName('Administrator');

    	try {
    		if ($cons == 'user') {
    			$added = Sentinel::registerAndActivate($input);
            	$added->roles()->attach($user);
            	Session::flash('notice', 'Please Login To Start Your session');
            	return redirect('/');
    		}else{
    			$added = Sentinel::registerAndActivate($input);
            	$added->roles()->attach($admin);
            	Session::flash('notice', 'Please Login To Start Your session');	
    			return redirect('/');
    		}
    		Session::flash('error', 'Your account cannot be created');
			return redirect()->back();
    	} catch (Exception $e) {
    		Session::flash('error', $e);	
    		return redirect()->back();
    	}
    }
}
