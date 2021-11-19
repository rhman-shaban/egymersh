<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Dashboard\Admins\StoreAdminRequest;
use App\Http\Requests\Dashboard\Admins\UpdateAdminRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    
    public function index()
    {
        $admins = Admin::whenSearch(request()->search)->latest()->paginate(10);
        
        return view('dashboard.admins.index',compact('admins'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.admins.create');
    }//end of create

    
    public function store(StoreAdminRequest $request)
    {



        $admin = new Admin;
        if(!$admin->add($request->all()))
            return back()->with('error'  , 'Error , Try Again' );

        if($request->hasFile('image')) {

            $image = $request->file('image')->store('admins'  , 's3');
            $admin->image = basename($image);
            $admin->save();
        }    

        return redirect(route('admins.index'))->with('success'  , 'Admin Has Been added successfully' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit'  , compact('admin') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request,Admin $admin)
    {

        if(!$admin->edit($request->all()))
            return back()->with('error'  , 'Error , Try Again' );

        if($request->hasFile('image')) {

            $image = $request->file('image')->store('admins'  , 's3' );
            $admin->image = basename($image);
            $admin->save();
        }    

        return redirect(route('admins.index'))->with('success'  , 'data Has Been update successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect(route('admins.index'))->with('success'  , 'Admin Has Been deleted successfully' );
    }
}
