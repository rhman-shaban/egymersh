<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StatusSellerMiddleware
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

        if (auth()->guard('seller')->user()->status == 'true') {

            return $next($request);
            
        } else {

            return redirect()->back();

        }//end of if

    }//end of handle

}//end of class
