<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class newscontroller extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->user()->role == 0){
      return view('dashboard.whatsnew');
    }else{
        return view('error');
    }
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'body' => 'required',
            
        ]);

        News::create($request->all());

        return redirect()->route('news')
            ->with('success', 'created successfully.');
      
    }
}
