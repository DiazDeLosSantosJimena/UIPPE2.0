<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AreaUsuarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $session_area = session('session_area');
        $area_ruta = intval($request->route('id'));

        if($session_area !== $area_ruta) {
            return redirect()->route('registrosA', ['id' => $session_area]);
        }

        return $next($request);
    }
}
