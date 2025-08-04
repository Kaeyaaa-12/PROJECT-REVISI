<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // Pengaturan ini akan mengarahkan pengguna yang sudah login
        // yang mencoba mengakses halaman 'guest' (seperti login)
        // ke '/dashboard'. Ini sudah mencakup semua jenis pengguna (termasuk admin kita).
        $middleware->redirectUsersTo('/dashboard');

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
