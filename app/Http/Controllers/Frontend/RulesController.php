<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\FriendshipRequest;

class RulesController extends Controller
{

    public function rulesPage()
    {
        if(Auth::check()) {
            $loggedUser = Auth::user();
            $friendshipNotificationsSenders = FriendshipRequest::senders($loggedUser->user_id);
            $friendshipNotifications = count($friendshipNotificationsSenders);
            return view('frontend.rules', compact('friendshipNotificationsSenders', 'friendshipNotifications'));
        }
        return view('frontend.rules');
    }

}