<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilRequest;
use Illuminate\Http\Request;
use App\Profil, App\User;
use Session, Sentinel, Storage;

class ProfilsController extends Controller
{
    function __construct()
    {
        $this->middleware('sentinel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id)->profil;

        return view('vendor.profil', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfilRequest $request, $id)
    {
        $data = Profil::where('user_id',$id)->get();

        Profil::where('user_id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'place_brn' => $request->place_brn,
            'date_brn' => $request->date_brn,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'about' => $request->about
        ]);

        User::find($id)->update(['first_name'=>$request->input('first_name'), 'last_name'=>$request->input('last_name')]);

        if($request->hasFile('lamaran')){
            $num = "CV_".$request->first_name.$request->phone_number.'.' . $request->file('lamaran')->extension();
            $request->file('lamaran')->storeAs('public/cv', $num);

            Profil::where('user_id', $id)->update(['lamaran'=> $num]);
        }

        if($request->hasFile('photo')){
            $num = "image_".str_random(10).'.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public/photo_profil', $num);

            if (!empty($data[0]->photo)) {
                Storage::delete('public/photo_profil/'.$data[0]->photo);
            }

            Profil::where('user_id', $id)->update(['photo'=> $num]);
        }

        Session::flash("notice", "Your Personal Profile Success Updated");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
