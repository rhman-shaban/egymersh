<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('dashboard.profile' , compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {
        $id = Auth::guard('admin')->id();
        $validated = $this->validate($request , [
            'name' => 'required' , 
            'username' => 'required|unique:admins,username,'.$id , 
            'image' => 'nullable|image'
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->username = $request->username;

        if($request->hasFile('image')) {
            $image = $request->file('image')->store('admins'  , 's3' );
            $admin->image = basename($image);
        } 

            $admin->save();

        return back()->with('success' , 'profile edited successfully'); 


        
    }

    
}
