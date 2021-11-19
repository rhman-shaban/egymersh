<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class newscontroller extends Controller
{
    public function index()
    {
      return view('dashboard.whatsnew');
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
