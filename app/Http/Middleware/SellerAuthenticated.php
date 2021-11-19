<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class SellerAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('seller')->check()) {
            
            return redirect()->route('user.login_form');

        } else {

            if (Auth::guard('seller')->user()->seller == '1') {

                return $next($request);
                
            } else {

                return redirect()->route('user.account');

            }//end of if

        }//end of if
        
    }//end of handle

}//end of class
