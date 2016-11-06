<?php

namespace App\Http\Controllers\Authentication;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    public function loadAuthPage()
    {
        $countries = Country::all();
        return view('authentication.auth', compact('countries'));
    }
}
