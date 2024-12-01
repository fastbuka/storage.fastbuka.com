<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            $response = [
                'status' => 401,
                'success' => false,
                'message' => 'Unauthenticated',
            ];
            return response()->json($response, 401);
        });

        $exceptions->render(function (ValidationException $e, Request $request) {
            $errors = [];
            $firstErrorMessage = null;

            foreach ($e->errors() as $field => $messages) {
                if ($firstErrorMessage === null) {
                    $firstErrorMessage = reset($messages);
                }

                $errors[$field] = [
                    'code' => $field,
                    'message' => $messages[0],
                ];
            }

            return response()->json([
                'status' => 422,
                'success' => false,
                'message' => $firstErrorMessage,
                'data' => $errors,
            ], $e->status);
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Record not found'
            ], 404);
        });

        $exceptions->render(function (RouteNotFoundException $e, Request $request) {
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => $e->getMessage(),
            ], 404);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            return response()->json([
                'status' => 405,
                'success' => false,
                'message' => $e->getMessage(),
            ], 405);
        });
    })->create();
