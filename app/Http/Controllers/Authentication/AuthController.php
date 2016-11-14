<?php

namespace App\Http\Controllers\Authentication;

use App\Country;
use App\Group;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // load auth page
    public function AuthPage()
    {
        $countries = Country::all();
        return view('authentication.auth', compact('countries'));
    }

    // Register a user
    public function register(Request $request)
    {
        $rules = [
            'email' => 'required|unique:users|email',
            'username' => 'required|unique:users|min:4|max:20',
            'password' => 'required|min:6|max:40|confirmed',
            'password_confirmation' => 'required',
            'country' => 'required',
            'gender' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::to('/auth')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        } else {
            $group = Group::where('group_name', 'users')->select('group_id')->get();
            $group = $group[0];

            $registrationToken = hash('sha256', str_random(10));
            //check if registrationToken is unique
            $registrationToken = $this->validateToken($registrationToken, 'registration_token');
            $passwordHash = Hash::make($request->input('password'));
            $user = [
                'groupID' => $group->group_id,
                'email' => $request->input('email'),
                'countryID' => $request->input('country'),
                'admin' => 0,
                'username' => $request->input('username'),
                'password' => $passwordHash,
                'activated' => 0,
                'registration_token' => $registrationToken,
                'status' => 1,
                'gender' => $request->input('gender'),
                'picture' => 'default.png',
                'user_ip' => $request->ip()
            ];
            User::create($user);
            $link = $request->root() .'/activate/' . $registrationToken;
            Mail::send('emails.activate-account', ['link' => $link], function ($message) use ($user) {
                $message->from('dzp@dzp.com', 'Activate Account');
                $message->to('claudiu.vasile13@yahoo.com')->subject('Activate account for ' . $user['username']);
            });
            return Redirect::to('/auth')
                ->with('activateAccountMessage', 'We sent you an email to activate your account.');
        }
    }

    public function resendActivationMailPage()
    {
        return view('authentication.resend-activation-email');
    }

    public function resendActivationMail(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $account = User::where('email', $request->input('email'))->get();
            if(count($account)) {
                if($account[0]->activated) {
                    return Redirect::to('/auth')
                        ->with('activateAccountSuccess', 'Your account is already activated, now you can login');
                } else {
                    $link = $request->root() .'/activate/' . $account[0]->registration_token;
                    Mail::send('emails.activate-account', ['link' => $link], function ($message) use ($account) {
                        $message->from('dzp@dzp.com', 'Activate Account');
                        $message->to('claudiu.vasile13@yahoo.com')->subject('Activate account for ' . $account[0]->username);
                    });
                    return Redirect::to('/auth')
                        ->with('activateAccountMessage', 'We sent you an email to activate your account.');
                }
            } else {
                return Redirect::to('/auth')
                    ->with('AccountNotFound', 'The account you are trying to activate does not exist');
            }
        }
    }

    public function validateToken($token, $field)
    {
        $data = [
            $field => $token
        ];

        $rules = [
            $field => 'unique:users'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            $token = hash('sha256', str_random(10));
            $this->validateToken($token);
        }
        return $token;
    }

    public function activateAccount($token)
    {
        $account = User::where('registration_token', $token)->get();
        if(count($account)) {
            if($account[0]->activated) {
                return Redirect::to('/auth')
                    ->with('activateAccountSuccess', 'Your account is already activated, now you can login');
            } else {
                $account[0]->activated = 1;
                $account[0]->save();
                return Redirect::to('/auth')
                    ->with('activateAccountSuccess', 'Your account is now activated, now you can login');
            }
        } else {
            return Redirect::to('/auth')
                ->with('activateAccountError', 'The account you are trying to activate does not exist');
        }
    }

    // Login a user
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::to('/auth')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userCredentials = [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ];
            $auth = auth()->guard('web');
            if($auth->attempt($userCredentials)) {
                $user = User::find($auth->user()->user_id);
                if($user->activated) {
                    return Redirect::to('/');
                } else {
                    return Redirect::to('/auth')
                        ->with('ActivationRequired', 'You need to activate your account. We sent you an email for activation.');
                }
            } else {
                return Redirect::to('/auth')
                    ->with('WrongCredentials', 'Wrong username or password');
            }
        }
    }

    // Load Reset Password Page
    public function resetPasswordPage()
    {
        return view('authentication.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where('email', $request->input('email'))->get();
            if(count($user)) {
                $passwordResetToken = hash('sha256', str_random(10));
                //check if registrationToken is unique
                $passwordResetToken = $this->validateToken($passwordResetToken, 'password_reset_token');
                $user[0]->password_reset_token = $passwordResetToken;
                $user[0]->save();
                $link = $request->root() .'/new-password/' . $passwordResetToken;
                Mail::send('emails.reset-password', ['link' => $link], function ($message) use ($user) {
                    $message->from('dzp@dzp.com', 'Reset Password');
                    $message->to('claudiu.vasile13@yahoo.com')->subject('Reset password for ' . $user[0]->username);
                });
                return Redirect::to('/reset-password')
                    ->with('ResetPasswordEmail', 'We sent you an email to reset your password!');
            } else {
                return Redirect::to('/auth')
                    ->with('AccountNotFound', 'There is no user with this email!');
            }
        }
    }

    public function newPasswordPage($token)
    {
        return view('authentication.new-password', compact('token'));
    }

    public function newPassword(Request $request) {
        $rules = [
            'password' => 'required|min:6|max:40|confirmed',
            'password_confirmation' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        } else {
            $account = User::where('password_reset_token', $request->input('resetPasswordToken'))->get();
            if(count($account)) {
                $passwordHash = Hash::make($request->input('password'));
                $account[0]->password = $passwordHash;
                $account[0]->password_reset_token = null;
                $account[0]->save();
                return Redirect::to('/auth')
                    ->with('newPasswordSuccess', 'Your password has been successfully reseted');
            } else {
                return Redirect::to('/auth')
                    ->with('AccountNotFound', 'The account you are trying to reset its password does not exist');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/auth');
    }

}
