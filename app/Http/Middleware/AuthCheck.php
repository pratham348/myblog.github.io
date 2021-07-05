<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware;


class AuthCheck
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
        

        if(!session()->has('email'))
        {
            return redirect('login');
        }
        //Manage Session
       /*  if(!session()->has('email')) {
             if($request->path() != 'login' && ($request->path() != 'register'))
             {
                return redirect('login')->with('fail', 'You must be logged in');
             }
           
        }*/

        //Prevent go to login page after login
        if(session()->has('email') && ($request->route() == 'login' || $request->route()=='register')) 
        {
            return back();
        }
        
        $response = $next($request);

        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');

        $response->headers->set('Pragma','no-cache');

        $response->headers->set('Expires','Sun, 02 Jan 1990 00:00:00 GMT');

        return $response;
    }
}
