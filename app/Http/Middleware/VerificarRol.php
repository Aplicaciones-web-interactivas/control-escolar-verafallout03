<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarRol
{
    public function handle(Request $request, Closure $next, $rol)
    {
        if (!$request->user() || $request->user()->rol !== $rol) {
            abort(403, 'Acceso denegado');
        }
        return $next($request);
    }
}
