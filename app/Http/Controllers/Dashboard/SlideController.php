<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Slides\StoreSlideRequest;
use App\Http\Requests\Dashboard\Slides\UpdateSlideRequest;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->role == 0){
       
        return view('dashboard.slides.index');
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
       
        return view('dashboard.slides.create');
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
    public function store(StoreSlideRequest $request)
    {
        $image = $request->file('image')->store('slides' , 's3');
        $image = basename($image);
        $slide = new Slide;

        if(!$slide->add($request->all() , $image))
            return back()->with( 'error' ,  'Error Try Again');

        return redirect(route('slides.index'))->with('success' , 'Slide Added Successfully');

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
    public function edit(Slide $slide)
    {
        return view('dashboard.slides.edit' , compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideRequest $request, Slide $slide )
    {

        if($request->hasFile('image')) {
            $image = $request->file('image')->store('slides' , 's3');
            $image = basename($image);
        } else {
            $image = $slide->image;
        }
        if(!$slide->edit($request->all()  , $image))
            return back()->with( 'error' ,  'Error Try Again');

        return redirect(route('slides.index'))->with('success' , 'Slide Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {   
        $slide->delete();
        return redirect(route('slides.index'))->with('success' , 'Slide Deleted Successfully');
    }
}
