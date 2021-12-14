<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Governorate;
use App\Http\Requests\Dashboard\Governorates\StoreGovernorateRequest;
use App\Http\Requests\Dashboard\Governorates\UpdateGovernorateRequest;
class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->role == 0){
        return view('dashboard.governorates.index');
    }else{
        return view('error');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->role == 0){
        return view('dashboard.governorates.create');
    }else{
        return view('error');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGovernorateRequest $request)
    {
        $governorate = new Governorate;
        $governorate->add($request->all());

        return redirect(route('governorates.index'))->with('success'  , 'Governorate Added Successfully' );
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
    public function edit(Governorate $governorate)
    {
        return view('dashboard.governorates.edit'  , compact('governorate') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGovernorateRequest $request,Governorate $governorate)
    {
        $governorate->edit($request->all());

        return redirect(route('governorates.index'))->with('success'  , 'Governorate Updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Governorate $governorate)
    {
        $governorate->delete();
        return redirect(route('governorates.index'))->with('success'  , 'Governorate Deleted Successfully' );
    }
}
