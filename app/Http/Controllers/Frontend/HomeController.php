<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\FriendshipRequest;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $isLoggedIn = Auth::check();
        $friendshipNotifications = 0;
        if ($isLoggedIn) {
            $loggedUser = Auth::user();
            $friendshipNotifications = FriendshipRequest::where('receiverID', $loggedUser->user_id)->get();
            $friendshipNotifications = count($friendshipNotifications);
        }
        return view('frontend.index', compact('friendshipNotifications'));
    }

}
