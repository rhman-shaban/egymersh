<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;


class email extends Controller
{
    public function index($id)
    {
        $email = Message::findOrFail($id);
        
        return view('dashboard.replay',compact('email'));
    }
    public function sendEmail(Request $request) {
       
        $toEmail    =   $request->email;
        $mymail= new MyTestMail(
            $request->input('subject'),
            $request->input('content')

        );
    
        

        // pass dynamic message to mail class
        Mail::to($toEmail)->send($mymail);

        if(Mail::failures() != 0) {
            return back()->with("success", "E-mail sent successfully!");
        }

        else {
            return back()->with("failed", "E-mail not sent!");
        }
    }
}
