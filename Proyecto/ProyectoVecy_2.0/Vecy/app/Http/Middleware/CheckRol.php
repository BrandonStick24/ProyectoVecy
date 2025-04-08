<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRol
{
    public function handle(Request $request, Closure $next, $rol)
    {
        if (auth()->user()->rol->desc_rol !== $rol) {
            abort(403, 'Acceso no autorizado');
        }
        return $next($request);
    }
}


