<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable  $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        /*dd($exception);*/
        if ($exception instanceof \BadMethodCallException) {
            if ($request->ajax()) {
                return response()->json($exception->getMessage()
                    . " Linea -> " . $exception->getLine()
                    . " Class -> " . $exception->getFile(), 500);
            }
            // return response()->view('errors.500', [], 500);
            // 
            return response()->json($exception->getMessage()
                . " Linea -> " . $exception->getLine()
                . " Class -> " . $exception->getFile(), 500);
        }

        if ($exception instanceof \Yajra\DataTables\Exception) {
            if ($request->ajax()) {
                return response()->json($exception->getMessage()
                    . " Linea -> " . $exception->getLine()
                    . " Class -> " . $exception->getFile(), 500);
            }
            // return response()->view('errors.500', [], 500);
            // 
            return response()->json($exception->getMessage()
                . " Linea -> " . $exception->getLine()
                . " Class -> " . $exception->getFile(), 500);
        }
        if ($exception instanceof \ErrorException) {

            if ($request->ajax()) {
                return response()->json('Lo siento, hubo un error, intente de nuevo.', 500);

                // return response()->json($exception->getMessage()
                //     . " Linea -> " . $exception->getLine()
                //     . " Class -> " . $exception->getFile(), 500);
            }
            // return response()->view('errors.500', [], 500);
            // 
            return response()->json($exception->getMessage()
                . " Linea -> " . $exception->getLine()
                . " Class -> " . $exception->getFile(), 500);
        }
        if ($exception instanceof QueryException) {

            if ($request->ajax()) {
                return response()->json('Lo siento, hubo un error, intente de nuevo.', 500);

                // return response()->json($exception->getMessage()
                //     . " Linea -> " . $exception->getLine()
                //     . " Class -> " . $exception->getFile(), 500);
            }
            // return response()->view('errors.500', [], 500);
            return response()->json($exception->getMessage()
                . " Linea -> " . $exception->getLine()
                . " Class -> " . $exception->getFile(), 500);
        }
        if ($exception instanceof AuthenticationException) {

            if ($request->ajax()) {
                return response()->json('Lo siento, su sesión ha expirado. Inicie session de nuevo.', 401);
            }

            return redirect('login')->withErrors(['token_error' => 'Sorry, your session seems to have expired. Please try again.']);
        }

        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {

            if ($request->ajax()) {
                return response()->json('Lo siento, su sesión ha expirado. Inicie session de nuevo.', 401);
            }

            return redirect('login')->withErrors(['token_error' => 'Sorry, your session seems to have expired. Please try again.']);
        }

        if ($exception instanceof AuthorizationException) {
            if ($request->ajax()) {
                return response()->json('No tiene permisos.', 403);
            }
            return response()->view('errors.403', [], 403);
        }
        if ($exception instanceof NotFoundHttpException) {
            if ($request->ajax()) {
                return response()->json('la página que está buscando no se pudo encontrar.', 404);
            }
            return response(view('errors.404'), 404);
        }
        return parent::render($request, $exception);
    }
}
