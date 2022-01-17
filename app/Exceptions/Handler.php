<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<String>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<String>
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, \Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            if (!$request->expectsJson()) {
                return redirect()->back()->withErrors($exception->errors());
            }
        }

        return parent::render($request, $exception);


//        if ($exception->getCode() == 500) {
//            return redirect()->back()->withErrors('Operácia neprebehla úspešne!');
//        }
//        dd('hej');
//        return parent::render($request, $exception);
    }

    public function report(\Throwable $e)
    {
        if ($e instanceof ValidationException) {
            Log::error("errors", $e->errors());
        }
        if ($e instanceof MethodNotAllowedHttpException) {
            Log::error($e->getMessage(), ['actualPage' => Request::url(), 'data' => Request::all()]);
        }
        if (!$e instanceof NotFoundHttpException && !$e instanceof AuthenticationException && !$e instanceof MethodNotAllowedHttpException) {
            Log::error($e->getMessage(), array_slice($e->getTrace(), 0, 7));
        }

    }
}
