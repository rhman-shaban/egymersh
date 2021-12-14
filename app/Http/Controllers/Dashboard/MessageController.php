<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if (Auth::guard('admin')->user()->role == 0){
        return view('dashboard.messages.index');
    }else{
        return view('error');
    }
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('dashboard.messages.show' , compact('message'));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success' , 'Message Deleted Successfully');
    }
}
