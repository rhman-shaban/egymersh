<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class RedirectIfNotAdminMiddleware
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
        if(!Auth::guard('admin')->check()) {

            return redirect(route('login_form'));

        } else {

            return $next($request);
        }
    }//end of handle

}//end of classs
