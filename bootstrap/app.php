<?php

use App\Http\Middleware\ManagerProduction;
use App\Http\Middleware\Operator;
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
        $middleware->alias([
            'manager-production' => ManagerProduction::class,
            'operator' => Operator::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
