<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Authentication'], function() {
    Route::group(['middleware' => 'ifGuest'], function() {
        // Register
        Route::get('/auth', 'AuthController@AuthPage');
        Route::post('/register', 'AuthController@register');
        Route::get('/activate/{token}', 'AuthController@activateAccount');
        Route::get('/resend-activation', 'AuthController@resendActivationMailPage');
        Route::post('/resend-activation', 'AuthController@resendActivationMail');

        // Login
        Route::post('/login', 'AuthController@login');
        Route::get('/reset-password', 'AuthController@resetPasswordPage');
        Route::post('/reset-password', 'AuthController@resetPassword');
        Route::get('/new-password/{token}', 'AuthController@newPasswordPage');
        Route::post('/new-password', 'AuthController@newPassword');
    });

    Route::get('/logout', 'AuthController@logout');
});

Route::group(['namespace' => 'Frontend'], function() {
    Route::group(['middleware' => 'ifLoggedIn'], function() {
        //Profile & Notifications
        Route::post('/changePassword', 'ProfileController@changePassword');
        Route::post('/edit-profile', 'ProfileController@editProfile');
        Route::post('/change-image', 'ProfileController@changeImage');
        Route::get('/delete-account', 'ProfileController@deleteAccount');
        Route::post('/send-friend-request', 'ProfileController@sendFriendRequest');
        Route::post('/cancel-friend-request', 'ProfileController@cancelFriendRequest');
        Route::get('/friendship-notifications', 'ProfileController@friendshipNotificationsPage');
        Route::get('/accept-friendship/{username}', 'ProfileController@acceptFriendship');
        Route::get('/decline-friendship/{username}', 'ProfileController@declineFriendship');
        Route::get('/remove-friend/{username}', 'ProfileController@removeFriend');
        Route::get('/pm', 'ProfileController@pmPage');
        Route::get('/send-pm/{username?}', ['uses' => 'ProfileController@sendPMPage']);
        Route::post('/send-pm', 'ProfileController@sendPM');

        Route::group(['middleware' => 'groupVerification'], function() {
            Route::get('/conduct-code', 'ConductCodeController@conductCodePage');
        });
    });

    Route::get('/', 'HomeController@index');
    Route::get('/profile/{username}', 'ProfileController@profilePage');
    Route::get('/about-us', 'AboutUsController@aboutUsPage');
    Route::get('/rules', 'RulesController@rulesPage');
    Route::get('/servers', 'ServersController@serversPage');
    Route::get('/join-us', 'JoinUsController@joinUsPage');
    Route::get('/roster', 'RosterController@rosterPage');
});
