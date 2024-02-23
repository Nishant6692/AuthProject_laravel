<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Illuminate\Support\Facades\Auth;

class AlreadyLogIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() &&(url('login') == $request->url()|| url('/') == $request->url())   ){
         return redirect('dashboard');
        }
        return $next($request);
    }
}
