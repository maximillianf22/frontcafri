<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use \Simfony\Component\HttpKernel\Exception\HttpException;
use \Illuminate\Database\ModelNotFoundException;
use \Illuminate\Database\QueryException;
use \Illuminate\Database\ValidationException;
use \Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler{
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
    public function report(Exception $exception)
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
    public function render($request, Exception $exception){
        return parent::render($request, $exception);
    /*
        //Illuminate\Database\Eloquent\ModelNotFoundException
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['error'=>'Error de Modelo','codigo'=>400], 400);
        }
        
        if ($exception instanceof ValidationException) {
            return response()->json(['error'=>$exception->validator->errors(),'codigo'=>400], 400);
        }

        if ($exception instanceof QueryException) {
            return response()->json(['error'=>'Error de la Consulta : '.$exception->getMessage(),'codigo'=>400], 400);
        }

        if ($exception instanceof HttpException) {
            return response()->json(['error'=>'Error de Ruta : ','codigo'=>404], 404);
        }

        if ($exception instanceof HttpException) {
            return response()->json(['error'=>'Error de Ruta : ','codigo'=>404], 404);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json(['error'=>'Error en la Autenticación  : ','codigo'=>401], 401);
        }

        return parent::render($request, $exception);
    */

    }
}
