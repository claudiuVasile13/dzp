<?php

namespace App\Http\Controllers\Backend;

use App\Country;
use App\Friendship;
use App\Group;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{

    public function usersPage(Request $request)
    {
        $users = User::paginate(10);
        return view('backend.users', compact('users'));
    }

    public function viewUserPage(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (count($user)) {
            $user->group;
            $user->ranks;
            $user->mainRank;
            $user['friends'] = Friendship::friends($user_id);
            return view('backend.view-user', compact('user'));
        } else {
            return Redirect::back()
                ->with('UserDoesNotExist', 'The user that you want view does not exist.');
        }
    }

    public function editUserPage(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (count($user)) {
            $user->group;
            $user['friends'] = Friendship::friends($user_id);
            $countries = Country::all();
            $groups = Group::all();
            return view('backend.edit-user', compact('user', 'countries', 'groups'));
        } else {
            return Redirect::back()
                ->with('UserDoesNotExist', 'The user that you want to edit does not exist.');
        }
    }

    public function editUser(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if(count($user)) {
            $rules = [
                'email' => 'required|email',
                'username' => 'required|min:4|max:20',
                'country' => 'required',
                'gender' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
                'signature' => 'mimes:jpg,jpeg,png'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                // Trim the input data
                $request->merge(array_map('trim', $request->all()));

                $userImageName = null;
                $userSignatureName = null;

                if($request->has('image')) {
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . "/img/users/";
                    $imageName = $user->user_id . '.' . $request->file('image')->getClientOriginalExtension();
                    Image::make($request->file('image'))->resize(300, null, function($constraint) {
                        $constraint->aspectRatio();
                    })->save($imagePath . $imageName);
                    $userImageName = $imageName;
                }

                if($request->has('signature')) {
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . "/img/signatures/";
                    $imageName = $user->user_id . '.' . $request->file('signature')->getClientOriginalExtension();
                    Image::make($request->file('signature'))->save($imagePath . $imageName);
                    $userSignatureName = $imageName;
                }

                return $request->input('password');
                if($request->input('password')) {

                }

                $profileData = [
                    'countryID' => $request->input('country'),
                    'gender' => $request->input('gender'),
                    'groupID' => $request->input('group'),
                    'username' => $request->input('username'),
                    'job_hobbies' => $request->input('job_hobbies'),
                    'gameranger_id' => $request->input('gameranger_id'),
                    'birthday' => $request->input('birthday'),
                    'status' => $request->input('status'),
                    'description' => $request->input('description'),
                    'email' => $request->input('email'),
                    'skype' => $request->input('skype'),
                    'facebook' => $request->input('facebook'),
                    'twitter' => $request->input('twitter')
                ];
                if($userImageName !== null) {
                    $profileData['user_image'] = $userImageName;
                }
                if
                ($userSignatureName !== null) {
                    $profileData['signature'] = $userSignatureName;
                }

                $user->update($profileData);
                return Redirect::to('/admin-panel/users')
                    ->with('EditProfileSuccess', 'You successfully edited the user ' . $user->username);
            }
        } else {
            return Redirect::to('/admin-panel/users')
                ->with('UserDoesNotExist', 'The user that you want to edit does not exist.');
        }
    }

}
