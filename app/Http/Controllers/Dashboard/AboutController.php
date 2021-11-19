<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\Dashboard\About\UpdateAboutRequest;
class AboutController extends Controller
{
    

    public function edit()
    {
        $about = About::first();
        return view('dashboard.about.edit' , compact('about'));
    }




    public function update(UpdateAboutRequest $request)
    {
        $about = About::first();
        $about->content_ar = $request->content_ar;
        $about->content_en = $request->content_en;
        $about->save();

        return back()->with('success' , 'Content Updated Successfully');
    }
}
