<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomerAuth;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'customer' => \App\Http\Middleware\CustomerAuth::class,
        ]);
        $middleware->replace(VerifyCsrfToken::class, \App\Http\Middleware\VerifyCsrfToken::class); 
       
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->map(AuthenticationException::class, function (AuthenticationException $exception) {
            $guard = $exception->guards()[0] ?? 'web';

            //echo $guard;

            // Determine the redirection URL based on the guard
            $redirectUrl = match ($guard) {
                'customer' => route('customer.login'),
                default => route('login'),
            };

            // Throw an HTTP exception instead of returning a response directly
            throw new \Symfony\Component\HttpKernel\Exception\HttpException(
                302,
                'Unauthenticated.',
                null,
                ['Location' => $redirectUrl]
            );
        });

        // $exceptions->map(AuthenticationException::class, function (AuthenticationException $exception) {
        //     $guard = $exception->guards()[0] ?? 'web';

        //     // Handle unauthenticated access based on guard
        //     $redirectUrl = match ($guard) {
        //         'customer' => route('customer.login'),
        //         default => route('login'),
        //     };

        //     // Allow logout requests to proceed without redirecting
        //     if (request()->routeIs('logout') || request()->is('logout')) {
        //         throw new HttpException(401, 'Unauthenticated');
        //     }

        //     // Redirect for other unauthenticated cases
        //     return request()->expectsJson()
        //         ? response()->json(['message' => 'Unauthenticated.'], 401)
        //         : redirect()->guest($redirectUrl);
        // });
    })->create();
