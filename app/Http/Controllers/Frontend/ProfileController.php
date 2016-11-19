<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

    public function profilePage($username)
    {
        $userSession = Auth::user();
        $user = User::find($userSession->user_id);
        $country = $user->country;
        $groups = $user->groups;
        return view('frontend.profile', compact('user', 'country', 'groups'));
    }

}
