<?php

namespace App\Http\Controllers\Frontend;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{

    // Load the profile page
    public function profilePage($profile_url_key)
    {
        $isLoggedIn = Auth::check();
        $isAccountOwner = false;
        $countries = [];
        if ($isLoggedIn) {
            $loggedUser = Auth::user();
            $user = User::where('profile_url_key', $profile_url_key)->get()[0];
            if ($loggedUser->user_id === $user->user_id) {
                $isAccountOwner = true;
                $countries = Country::all();
            }
        } else {
            $user = User::where('profile_url_key', $profile_url_key)->get()[0];
        }
        $user->country;
        $user->groups;
        return view('frontend.profile', compact('user', 'countries', 'isAccountOwner'));
    }

    // Edit Users's Profile
    public function editProfile(Request $request)
    {
        $isLoggedIn = Auth::check();
        if ($isLoggedIn) {
            $rules = [
                'email' => 'required|email',
                'username' => 'required|min:4|max:20',
                'country' => 'required',
                'gender' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                // Trim the input data
                $request->merge(array_map('trim', $request->all()));

                if($request->input('brithday')) {
                    $profileData['birthday'] = $request->input('birthday');
                } else {
                    $profileData['birthday'] = null;
                }

                // Create profile_url
                $usernameArray = explode(' ', $request->input('username'));
                $profile_url_key = implode('-', $usernameArray);

                $profileData = [
                    'country' => $request->input('country'),
                    'gender' => $request->input('gender'),
                    'username' => $request->input('username'),
                    'profile_url_key' => $profile_url_key,
                    'job_hobbies' => $request->input('job_hobbies'),
                    'gameranger_id' => $request->input('gameranger_id'),
                    'status' => $request->input('status'),
                    'description' => $request->input('description'),
                    'email' => $request->input('email'),
                    'skype' => $request->input('skype'),
                    'facebook' => $request->input('facebook'),
                    'twitter' => $request->input('twitter'),
                ];
                $user = Auth::user();
                $user->update($profileData);
//                return 'profile/' . $user->profile_url_key;
                return Redirect::to('profile/' . $user->profile_url_key)
                    ->with('EditProfileSuccess', 'Your profile has been successfully edited');
            }
        } else {
            return Redirect::to('/auth');
        }
    }

    // Change User's Image
    public function changeImage(Request $request)
    {
        $isLoggedIn = Auth::check();
        if ($isLoggedIn) {
            $rules = [
                'image' => 'required|mimes:jpg,jpeg'
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                $user = Auth::user();
                $imagePath = $_SERVER['DOCUMENT_ROOT'] . "/img/users/";
                $imageName = $user->username . '.' . $request->file('image')->getClientOriginalExtension();
//                $request->file('image')->move($imagePath, $imageName);
                $image = Image::make($request->file('image'))->resize(300, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save($imagePath . $imageName);
                $user->picture = $imageName;
                $user->save();
                return Redirect::back()
                    ->with('ChangeImageSuccess', 'Your profile\'s image has been successfully changed');
            }
        } else {
            return Redirect::to('/auth');
        }
    }

    // Change User's Password
    public function changePassword(Request $request)
    {
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

    //  Delete Account
    public function deleteAccount()
    {
        $isLoggedIn = Auth::check();
        if ($isLoggedIn) {
            $user = Auth::user();
            $user->delete();
            return Redirect::to('/auth');
        } else {
            return Redirect::to('/auth');
        }
    }
    
}
