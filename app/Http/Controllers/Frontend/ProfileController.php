<?php

namespace App\Http\Controllers\Frontend;

use App\Country;
use App\Friendship;
use App\FriendshipRequest;
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
        $friendshipStatus = 'none';
        $countries = [];
        if ($isLoggedIn) {
            $loggedUser = Auth::user();
            $friendshipNotifications = FriendshipRequest::where('receiverID', $loggedUser->user_id)->get();
            $friendshipNotifications = count($friendshipNotifications);
            $user = User::where('profile_url_key', $profile_url_key)->get()[0];
            if ($loggedUser->user_id === $user->user_id) {
                $isAccountOwner = true;
                $countries = Country::all();
            } else {
                $friendshipRequestSender = FriendshipRequest::where('senderID', $loggedUser->user_id)
                                                            ->where('receiverID', $user->user_id)
                                                            ->get();
                $friendshipRequestReceiver = FriendshipRequest::where('senderID', $user->user_id)
                                                              ->where('receiverID', $loggedUser->user_id)
                                                              ->get();
                $friendshipLoggedUser = Friendship::where('userID', $user->user_id)
                                                  ->where('friendID', $loggedUser->user_id)
                                                  ->get();
                $friendshipUser = Friendship::where('userID', $loggedUser->user_id)
                                            ->where('friendID', $user->user_id)
                                            ->get();
                if(count($friendshipRequestSender)) {
                    $friendshipStatus = 'request_sender';
                } else if(count($friendshipRequestReceiver)) {
                    $friendshipStatus = 'request_receiver';
                } else if(count($friendshipLoggedUser) || count($friendshipUser)) {
                    $friendshipStatus = 'friends';
                }
            }
        } else {
            $user = User::where('profile_url_key', $profile_url_key)->get()[0];
        }
        $user->country;
        $user->groups;
        $friends = Friendship::friends($user->user_id);
        return view('frontend.profile', compact('user', 'countries', 'isAccountOwner', 'isLoggedIn', 'friendshipStatus', 'friendshipNotifications', 'friends'));
    }

    // Edit Users's Profile
    public function editProfile(Request $request)
    {
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
            return Redirect::to('/profile/' . $user->profile_url_key)
                ->with('EditProfileSuccess', 'Your profile has been successfully edited');
        }
    }

    // Change User's Image
    public function changeImage(Request $request)
    {
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
            $image = Image::make($request->file('image'))->resize(300, null, function($constraint) {
                $constraint->aspectRatio();
            })->save($imagePath . $imageName);
            $user->picture = $imageName;
            $user->save();
            return Redirect::back()
                ->with('ChangeImageSuccess', 'Your profile\'s image has been successfully changed');
        }
    }

    // Change User's Password
    public function changePassword(Request $request)
    {
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
    }

    //  Delete Account
    public function deleteAccount()
    {
        $user = Auth::user();
        $user->delete();
        return Redirect::to('/auth');
    }

    // Send a friend request
    public function sendFriendRequest(Request $request)
    {
        $sender = Auth::user();
        $receiver = User::where('profile_url_key', $request->input('receiver'))->get();
        if(count($receiver)) {
            $receiver = $receiver[0];
            $friendRequestSender = FriendshipRequest::where('senderID', $sender->user_id)
                                                    ->where('receiverID', $receiver->user_id)
                                                    ->get();
            $friendRequestReceiver = FriendshipRequest::where('senderID', $receiver->user_id)
                                                    ->where('receiverID', $sender->user_id)
                                                    ->get();
            if($receiver->user_id === $sender->user_id) {
                return Redirect::back()
                    ->with('FriendRequestHimself', 'Your can not send yourself a friend request');
            } else if(count($friendRequestSender)) {
                return Redirect::back()
                    ->with('FriendRequestSender', 'You have already sent a friend request to this user');
            } else if(count($friendRequestReceiver)) {
                return Redirect::back()
                    ->with('FriendRequestReceiver', 'This user sent you a friend request.');
            } else {
                $friendRequestData = [
                    'senderID' => $sender->user_id,
                    'receiverID' => $receiver->user_id
                ];
                FriendshipRequest::create($friendRequestData);
                return Redirect::back()
                    ->with('FriendRequestSuccess', 'Your friend request has been sent');
            }
        } else {
            return Redirect::to('/profile/' . $sender->profile_url_key)
                ->with('UserDoesNotExist', 'The user that you want to send a friend request does not exist');
        }
    }

    // Cancel a friend request
    public function cancelFriendRequest(Request $request)
    {
        $sender = Auth::user();
        $receiver = User::where('profile_url_key', $request->input('receiver'))->get();
        if(count($receiver)) {
            $receiver = $receiver[0];
            $friendshipRequest = FriendshipRequest::where('senderID', $sender->user_id)
                                                  ->where('receiverID', $receiver->user_id)
                                                  ->get();
            if(count($friendshipRequest)) {
                $friendshipRequest[0]->delete();
                return Redirect::back()
                    ->with('FriendRequestSuccess', 'Your friend request has been canceled');
            } else {
                return Redirect::back()
                    ->with('FriendRequestDoesNotExist', 'The friend request does not exist');
            }
        } else {
            return Redirect::to('/profile/' . $sender->profile_url_key)
                ->with('UserDoesNotExist', 'The user that you want to cancel the friend request does not exist');
        }
    }

    // Send friend request notification the the receiver user
    public function friendshipNotificationsPage()
    {
        $loggedUser = Auth::user();
        $friendshipNotificationsSenders = FriendshipRequest::senders($loggedUser->user_id);
        $friendshipNotifications = count($friendshipNotificationsSenders);
        return view('frontend.friendship-notifications', compact('friendshipNotificationsSenders', 'friendshipNotifications'));
    }
    
    // Accept Friendship
    public function acceptFriendship($profile_url_key)
    {
        $loggedUser = Auth::user();
        $sender = User::where('profile_url_key', $profile_url_key)->get();
        if(count($sender)) {
            $sender = $sender[0];
            $friendshipRequest = FriendshipRequest::where('senderID', $sender->user_id)
                                                  ->where('receiverID', $loggedUser->user_id)
                                                  ->get();
            if (count($friendshipRequest)) {
                Friendship::create([
                    'userID' => $sender->user_id,
                    'friendID' => $loggedUser->user_id
                ]);
                $friendshipRequest[0]->delete();
                return Redirect::to('/profile/' . $sender->profile_url_key)
                    ->with('FriendshipAccepted', 'You are now friend with ' . $sender->username);
            } else {
                return Redirect::to('/friendship-notifications')
                    ->with('FriendshipRequestDoesNotExist', 'The friendship request that you want to accept does not exist');
            }
        } else {
            return Redirect::to('/friendship-notifications')
                ->with('SenderDoesNotExist', 'The user that you want to accept the friend request does not exist');
        }
    }
    
    // Decline Friendship
    public function declineFriendship($profile_url_key)
    {
        $loggedUser = Auth::user();
        $sender = User::where('profile_url_key', $profile_url_key)->get();
        if(count($sender)) {
            $sender = $sender[0];
            $friendshipRequest = FriendshipRequest::where('senderID', $sender->user_id)
                                                  ->where('receiverID', $loggedUser->user_id)
                                                  ->get();
            if (count($friendshipRequest)) {
                $friendshipRequest[0]->delete();
                return Redirect::to('/profile/' . $sender->profile_url_key)
                    ->with('FriendshipDeclined', 'You declined the friendship request from ' . $sender->username);
            } else {
                return Redirect::to('/friendship-notifications')
                    ->with('FriendshipRequestDoesNotExist', 'The friendship request that you want to decline does not exist');
            }
        } else {
            return Redirect::to('/friendship-notifications')
                ->with('SenderDoesNotExist', 'The user that you want to decline the friend request does not exist');
        }
    }

    // Remove a friend
    public function removeFriend($profile_url_key)
    {
        $loggedUser = Auth::user();
        $friend = User::where('profile_url_key', $profile_url_key)->get();
        if(count($friend)) {
            $friend = $friend[0];
            $friendshipSender = Friendship::where('userID', $friend->user_id)
                                           ->where('friendID', $loggedUser->user_id)
                                           ->get();
            $friendshipReceiver = Friendship::where('userID', $loggedUser->user_id)
                                            ->where('friendID', $friend->user_id)
                                            ->get();
            if (count($friendshipSender)) {
                $friendshipSender[0]->delete();
                return Redirect::to('/profile/' . $loggedUser->profile_url_key)
                    ->with('FriendshipRemoved', 'You removed ' . $friend->username . ' from your friends list');
            } else if(count($friendshipReceiver)) {
                $friendshipReceiver[0]->delete();
                return Redirect::to('/profile/' . $loggedUser->profile_url_key)
                    ->with('FriendshipRemoved', 'You removed ' . $friend->username . ' from your friends list');
            } else {
                return Redirect::to('/profile/' . $loggedUser->profile_url_key)
                    ->with('FriendshipDoesNotExist', 'The friendship that you want to remove does not exist');
            }
        } else {
            return Redirect::to('/profile/' . $loggedUser->profile_url_key)
                ->with('FriendDoesNotExist', 'The user that you want to remove from your friends list does not exist');
        }
    }

}
