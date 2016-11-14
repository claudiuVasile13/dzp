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
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/profile/{username}', 'ProfileController@profilePage');
});
