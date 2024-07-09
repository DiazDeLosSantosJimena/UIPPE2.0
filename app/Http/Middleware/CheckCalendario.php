<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCalendario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $userRole = auth()->user()->id_tipo;

            if (in_array($userRole, [1, 2, 3, 4])) {
                return $next($request);
            }
        }
        
        abort(403, 'Unauthorized action.');
    }
}
