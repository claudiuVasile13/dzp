<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function profilePage($username)
    {
        return $username;
        return view('frontend.profile');
    }

}
