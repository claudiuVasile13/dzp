<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function profilePage($username)
    {
        $isLoggedIn = Auth::check();
        $isAccountOwner = false;
        if ($isLoggedIn) {
            $loggedUser = Auth::user();
            $user = User::where('username', $username)->get()[0];
            if ($loggedUser->user_id === $user->user_id) {
                $isAccountOwner = true;
            }
        } else {
            $user = User::where('username', $username)->get()[0];
        }
        $user->country;
        $user->groups;
        return view('frontend.profile', compact('user', 'isAccountOwner'));
    }

    public function editProfile($username)
    {

    }

    public function changeImage($username)
    {

    }

    public function changePassword(Request $request)
    {
//        return $request->all();
        $isLoggedIn = Auth::check();
        if ($isLoggedIn) {
            $rules = [
                'current_password' => 'required',
                'password' => 'required|min:6|max:40|confirmed',
                'password_confirmation' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                $loggedUser = Auth::user();
                if (Hash::check($request->input('current_password'), $loggedUser->password)) {
                    $loggedUser->password = Hash::make($request->input('password'));
                    $loggedUser->save();
                    return Redirect::back()
                        ->with('NewPassword', 'The new password has been saved');
                } else {
                    return Redirect::back()
                        ->with('IncorrectPassword', 'The current password is incorrect');
                }
            }
        } else {
            return Redirect::to('/auth');
        }
    }

}
