<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ActionFailedException extends Exception implements ICustomException
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //todo: tu nejdem
        Log::alert($this->getMessage(), $this->getTrace());
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function render(Request $request)
    {
//        dd($this->getMessage(), $this->getTrace());
//        return response('Operácia neprebehla úspešne!', 500);
        if (!$request->expectsJson()) {
//            return redirect()->back()->withErrors('Operácia neprebehla úspešne!');
        }
    }
}
