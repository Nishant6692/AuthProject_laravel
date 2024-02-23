<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckDomainAndRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
  
         
  
          if (Auth::check() && !($request->url()== route('admin-dashboard'))) {
              return redirect()->route('dashboard');
          }
          if (Auth::check() && !($request->url()== route('dashboard'))) {
            return redirect()->route('admin-dashboard');
        }
        return $next($request);
    }
}
