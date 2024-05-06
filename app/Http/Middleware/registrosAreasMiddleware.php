<?php

namespace App\Http\Middleware;

use App\Models\Areas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class registrosAreasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $area = Areas::find($request->route('id'));

        if ($area === null) {
            return redirect('registros');
        }

        return $next($request);
    }
}
