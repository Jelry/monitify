<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authcheckstudent
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
        if(!session()->has('LoggedUserS')&&($request->path() !='auth/login' && $request->path() !='auth/register'))
        {
            return redirect ('auth/login')->with('fail','Dapat you must be logged in ka muna');
            
        }
        else
        {
            if(session()->has('LoggedUserS')&&($request->path()=='auth/login'|| $request->path() == 'auth/register'))
            {
                return back();
               
            }
            return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sat 01 Jan 1999 00:00:00 GMT');
           
        }
        
       
    }
}
