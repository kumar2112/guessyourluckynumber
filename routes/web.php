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

//Route::get('/', function () {
//    return view('security.login');
//});
Route::get("/","SecurityController@login")->name('security.login');
Route::post("login_process","SecurityController@loginProcess")->name('security.login_process');

Route::get("sign-up","SecurityController@signUp")->name('security.signup');
Route::post("signup_process","SecurityController@signUpProcess")->name('security.signup_process');

Route::get("otp","SecurityController@otp")->name('security.otp');
Route::post("otp_process","SecurityController@otp_process")->name('security.otp_process');

Route::get("/{action}","SecurityController@setResetPassword")->name('security.setreset_password')->where('action','set-password|reset-password');
Route::post("complete_signup_process","SecurityController@completeSignUpProcess")->name('security.complete_signup_process');

Route::get("game/start","GameController@start")->name('game.start');

Route::post("game/shuffle","GameController@shuffle")->name('game.shuffle');

Route::get("game/result","GameController@result")->name('game.result');
