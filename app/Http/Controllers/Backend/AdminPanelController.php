<?php

namespace App\Http\Controllers\Backend;

use App\Friendship;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class AdminPanelController extends Controller
{

    public function dashboardPage(Request $request)
    {
        return view('backend.dashboard');
    }

    public function usersPage(Request $request)
    {
        $users = User::paginate(10);
        return view('backend.users', compact('users'));
    }

    public function viewUserPage(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->group;
        $user->ranks;
        $user['friends'] = Friendship::friends($user_id);
        $user['received_pm'] = PrivateMessage::receivedPM($user_id);
        $user['sent_pm'] = PrivateMessage::sentPM($user_id);
        $user['new_pm'] = PrivateMessage::newPM($user_id);
        if (count($user)) {
            return view('backend.view-user', compact('user'));
        } else {
            return Redirect::back()
                ->with('UserDoesNotExist', 'The user that you want view does not exist.');
        }
    }

}
