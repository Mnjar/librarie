<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LocalizationMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        // Menambahkan middleware pada route web
        $middleware->alias([
            'localization' => LocalizationMiddleware::class,
            'admin' => AdminMiddleware::class,
        ]);

        // $middleware->web([
        //     LocalizationMiddleware::class,
        //     'admin' => AdminMiddleware::class,

        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


