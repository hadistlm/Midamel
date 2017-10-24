<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job, App\Application, App\Profil;
use Sentinel, Session, DB;

class HomesController extends Controller
{
	function __construct()
	{
		$this->middleware('sentinel');
	}

    public function index()
    {
        $user = Sentinel::getUser('id');
        $apli = Application::where('user_id', $user->id)->first();

        //User Panel
        $data = Job::all();
        $status = $app = DB::table('applications')
            ->where('user_id', $user->id)
            ->join('jobs', 'applications.job_id', '=', 'jobs.id')->get();
        if (empty($apli->accepted) && empty($apli->msg_read)) {
           $si = 'All your application never been touched';
        }else{
            $si = 'Some of your application has been noticed';
        }

    	//Admin Panel
        $app = DB::table('applications')
            ->join('profils', 'applications.user_id', '=', 'profils.user_id')
            ->join('jobs', 'applications.job_id', '=', 'jobs.id')->get();
        $msg_read = DB::table('applications')->whereNUll('msg_read')->get();
        $msg_acc = Application::where('accepted', '=', 1)->get();
        $msg_rej = Application::where('accepted', '=', 2)->get();

    	$no = 1;
    	return view('vendor.home', compact('data', 'no', 'app', 'si', 'msg_read', 'msg_acc', 'msg_rej', 'apli', 'status'));
    }

    public function regis($id)
    {
        $user = Sentinel::getUser('id');
        $get = profil::where('user_id', $user->id)->first();
        $app = Application::where('user_id', $user->id)->get();

        if (empty($get->lamaran) || empty($get->about)) {
            Session::flash('error', "Please update your profile before choosing a job");
        }else{
            $new = Application::create([
                'user_id' => $user->id,
                'job_id' => $id
            ]);
            Session::flash('notice', "Job Choosen please wait for another update about your application");
        }

        foreach ($app as $key) {
            if ($key->job_id == $id && $key->user_id == $user->id) {
                Session::flash('error', "You cant assign to the same job twice");
                Session::forget('notice');
                Application::where('id', $new->id)->delete();
            }
        }

        
        return redirect()->route('dashboard');
    }

    public function fileDownload($user, $set)
    {
        Application::where('user_id', $user)->update(['msg_read' => 1]);
        $pathToFile = public_path()."storage/cv";

        return response()->download($pathToFile, $set);
    }

    public function changeStatus(Request $request, $user, $job)
    {
        $value = $request->input('action', '');
        $get = Profil::where('user_id',$user)->first();
        Application::where('user_id', $user)->update(['msg_read' => 1]);

        if ($value == "Accept") {
            Application::where([['user_id', $user],['job_id', $job]])->update(['accepted' => 1]);
            Session::flash('notice', $get->first_name." Has been assigned to current job position");
        }else{
            Application::where([['user_id', $user],['job_id', $job]])->update(['accepted' => 2]);
            Session::flash('warning', $get->first_name." Has been rejected to current job position");
        }
        return redirect()->route('dashboard');
    }
}
