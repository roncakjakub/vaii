<?php

namespace App\Http\Controllers;

use App\Models\LicenceType;

class HomeController extends Controller
{
    public function __invoke()
    {
        $licenceTypes = LicenceType::all();
        return view('home',compact("licenceTypes"));
    }
}
