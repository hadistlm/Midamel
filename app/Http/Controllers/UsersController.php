<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Profil, App\User;
use Session, Sentinel, Storage;

class UsersController extends Controller
{
    public function signup()
    {
    	return view('auth.register');
    }

    public function store(UserRequest $request, $role)
    {
    	$input = [
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'email' => $request->email,
    		'password' => $request->password
    	];
        $user = Sentinel::findRoleByName('User');
        $admin = Sentinel::findRoleByName('Administrator');

    	try {
    		if ($role == 'user') {
    			$added = Sentinel::registerAndActivate($input);
            	$added->roles()->attach($user);

                Profil::create([
                    'user_id' =>  $added->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email
                ]);

            	Session::flash('notice', 'Please Login To Start Your session');
            	return redirect('/');
    		}else{
    			$added = Sentinel::registerAndActivate($input);
            	$added->roles()->attach($admin);

                Profil::create([
                    'user_id' =>  $added->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email
                ]);

            	Session::flash('notice', 'Please Login To Start Your session');	
    			return redirect('/');
    		}
    		Session::flash('warning', 'Your account cannot be created');
			return redirect()->back();
    	} catch (Exception $e) {
    		Session::flash('error', $e);	
    		return redirect()->back();
    	}
    }

    public function userList()
    {
        $data = User::all()->where('id', '>', 1);
        $i = 1;

        return view('vendor.list', compact('data', 'i'));
    }

    public function delete($id)
    {
        $user = Sentinel::findById($id);
        $data = Profil::where('user_id', $id)->get();

        if($user->delete() && !empty($data)){
            if (!empty($data[0]->photo)) {
                Storage::delete('public/photo_profil/'.$data[0]->photo);
            }
            if (!empty($data[0]->lamaran)) {
               Storage::delete('public/cv/'.$data[0]->lamaran);
            }

            Profil::where('user_id', $id)->delete();
            Session::flash('notice', "Success Delete Account");
            return redirect()->back();
        }else{
            Session::flash('error', 'Cannot delete user');    
            return redirect()->back();
        }

    }
}
