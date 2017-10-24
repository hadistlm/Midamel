<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job, App\Application;
use Sentinel, DB;

class HomesController extends Controller
{
	function __construct()
	{
		$this->middleware('sentinel');
	}

    public function index()
    {
        $user = Sentinel::getUser('id');

        if (empty($apli->accepted) && empty($apli->msg_read)) {
           $si = 'All your application never been touched';
        }

    	$data = Job::all();
        $app = DB::table('applications')
            ->join('profils', 'applications.user_id', '=', 'profils.user_id')
            ->join('jobs', 'applications.job_id', '=', 'jobs.id')->get();
        $msg_read = DB::table('applications')->whereNUll('msg_read')->get();
    	$no = 1;
    	return view('vendor.home', compact('data', 'no', 'app', 'si', 'msg_read'));
    }

    public function regis($id)
    {
        $user = Sentinel::getUser('id');

        Application::create([
            'user_id' => $user->id,
            'job_id' => $id
        ]);


        return redirect()->route('dashboard');
    }
}
