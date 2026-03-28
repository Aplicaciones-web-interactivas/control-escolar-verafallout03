<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Middleware individuales que puedes usar en tus rutas.
     */
    protected $routeMiddleware = [
        // Autenticación básica (Laravel ya lo trae)
        'auth' => \App\Http\Middleware\Authenticate::class,

        // Evita que usuarios logueados entren al login (Laravel ya lo trae)
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Tu middleware personalizado para roles
        'role' => \App\Http\Middleware\VerificarRol::class,
    ];
}
