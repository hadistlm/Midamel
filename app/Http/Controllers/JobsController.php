<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Job;
use Session;

class JobsController extends Controller
{
    public function index()
    {
    	$data = Job::all();
    	$no = 1;

    	return view('vendor.jlist', compact('data', 'no'));
    }

    public function create()
    {
    	return view('vendor.jadd');
    }

    public function store(JobRequest $request)
    {
    	try {
    		Job::create($request->all());
    		Session::flash('notice', "Success Add New Job");

    		return redirect()->route('jobs.index');
    	} catch (Exception $e) {
    		Session::flash('error', $e);

    		return redirect()->back();
    	}
    }

    public function edit($id)
    {
    	$data = Job::find($id);

    	return view('vendor.jedit', compact('data'));
    }

    public function update(Request $request, $id)
    {
    	Job::find($id)->update($request->all());
    	Session::flash("notice", "Job Preferences Success Updated");
    	return redirect()->route('jobs.index');
    }

    public function destroy($id)
    {
    	try {
    		Job::destroy($id);
    		Session::flash('notice', "Job has been deleted");
    		return redirect()->route('jobs.index');
    	} catch (Exception $e) {
    		Session::flash('error', $e);
    		return redirect()->route('jobs.index');
    	}
    }
}
