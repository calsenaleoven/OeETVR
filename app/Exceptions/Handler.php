<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    
    public function render($request, Throwable $exception)
    {
        // Check if the exception is a 404 error
        if ($exception instanceof NotFoundHttpException) {
            // If the user is authenticated, log them out
            if (Auth::check()) {
                Auth::logout();
            }

            // Redirect to the login page
            return redirect()->route('login');
        }

        // Default behavior for other exceptions
        return parent::render($request, $exception);
    }
}
