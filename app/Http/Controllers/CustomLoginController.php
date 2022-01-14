<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Http\Request;

class CustomLoginController extends Controller
{
    public function __invoke()
    {
        if (User::where('email',\request()->get("email"))->whereNotNull('password')->exists()) {
            return app(LoginController::class)->login(\request());
        } else {
            return app(LoginController::class)->sendFailedLoginResponse(\request());
        }
    }
}
