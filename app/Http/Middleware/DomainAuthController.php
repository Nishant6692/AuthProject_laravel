<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DomainAuthController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedDomains = '127.0.0.1';
        $currentDomain = $request->host();

        if (!($allowedDomains==$currentDomain)) {
            abort(403, 'Unauthorized domain');
        }
        return $next($request);
    }
}
