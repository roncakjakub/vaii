<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\BasicEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(SendEmailRequest $request)
    {

    }

    public function send(SendEmailRequest $request)
    {
        Mail::send(new BasicEmail($request->validated()));
//        return mail('f@j.sk',$request->get('data'),$request->get('message'));
    }
}
