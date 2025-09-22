<?php

use App\Http\Middleware\CookieAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register middleware alias
        $middleware->alias([
            'cookie.auth' => CookieAuthMiddleware::class,
        ]);

        // ❌ Don't attach CookieAuth globally, otherwise all API routes are protected
        // If you want every API route protected by default, uncomment this:
        // $middleware->api(prepend: [
        //     CookieAuthMiddleware::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
