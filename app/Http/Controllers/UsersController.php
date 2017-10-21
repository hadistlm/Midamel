<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function signup()
    {
    	return view('auth.register');
    }

    public function store(UserRequest $request)
    {
    	
    }
}
