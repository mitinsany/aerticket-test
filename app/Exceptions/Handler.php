<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

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

    /**
     * Render the exception into an HTTP response.
     * @param Request $request
     * @param Throwable $e
     */
    public function render($request, Throwable $e)
    {
        Log::error($e->getMessage(), [$e->getFile(), $e->getLine()]);

        return response()->json([
            'status' => 'error',
            //'error' => get_class($e),
            'error_message' => $e->getMessage(),
        ], 400);
    }
}
