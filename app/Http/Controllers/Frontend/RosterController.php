<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\FriendshipRequest;
use App\PrivateMessage;

class RosterController extends Controller
{

    public function rosterPage()
    {
        if(Auth::check()) {
            $loggedUser = Auth::user();
            // The number of Friendship Notifications
            $friendshipNotificationsSenders = FriendshipRequest::senders($loggedUser->user_id);
            $friendshipNotifications = count($friendshipNotificationsSenders);
            // The number of new pm received
            $pmNotifications = PrivateMessage::where('pm_receiver', $loggedUser->user_id)->where('status', 'not read')->get();
            $pmNotifications = count($pmNotifications);
            return view('frontend.roster', compact('friendshipNotificationsSenders', 'friendshipNotifications', 'pmNotifications'));
        }
        return view('frontend.roster');
    }

}