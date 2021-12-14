<?php

namespace App\Http\Controllers\Site\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Seller;

class RegisterController extends Controller
{
   
    public function create()
    {
         if (Auth::guard('seller')->check()) {

            return redirect()->back();
            
        } else {

            return view('site.register');

        }//end of if

    }//end of create

    
    public function store(Request $request)
    {   

        $request->validate([
            'email'         => ['required','unique:sellers'],
            'name'          => ['required'],
            'phone'         => ['required'],
            'password'      => ['required','confirmed','min:8'],
        ]);

        try {

            $request_data             = $request->except(['password_confirmation']);
            $request_data['password'] = bcrypt($request->password);

            $seller = Seller::create($request_data);

            if (auth()->guard('seller')->attempt([
                'email'    => $request->email, 
                'password' => $request->password])) {

                return redirect()->route('user.account');

            } else {
                
                return redirect()->back();
                
            }//end of attempt

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try catch

    }//end of store

}//end of controller
