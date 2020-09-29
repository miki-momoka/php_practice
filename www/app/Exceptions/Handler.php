<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Session\TokenMismatchException; // add

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

    // CSRFトークンの有効期限切れ
    public function render($request, Exception $exception)
    {
        print "トークンエラー";die();
        // 「the page has expired due to inactivity. please refresh and try again」を表示させない
        if ($exception instanceof TokenMismatchException) {
            return redirect('/form/input')->with('message', 'セッションの有効期限が切れました。再度ログインしてください。');
        }
        return parent::render($request, $exception);
    }
}
