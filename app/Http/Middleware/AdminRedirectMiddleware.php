<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminRedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
       
        if( Auth::check()){
            if (Auth::user()->is_admin== true) {
                return $next($request);
            }
            else{
                return redirect('/home')->with('status','acce as you not as admin');
            }

        }
        else
        {
            return redirect('/home')->with('status','plesa login first');
        }
        
    }
}
