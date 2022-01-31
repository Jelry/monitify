<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class authcheck
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
        $usertype = User::where('id','=',session('LoggedUser'))->first();
        if(!session()->has('LoggedUser')&&($request->path() !='log' && $request->path() !='reg'))
        {
            return redirect ('/')->with('fail','You must be logged in');
        }
        else
        {
            if(session()->has('LoggedUser')&&($request->path()=='log'|| $request->path() == 'reg'||$request->path() == '/home'))
            {
                // return redirect('instructor/dashboard');
                 return back();
            }
            return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sat 01 Jan 1999 00:00:00 GMT');
           
        }
   
        
       
    }
}
