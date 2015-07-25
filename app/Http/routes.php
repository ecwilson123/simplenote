<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('auth/register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('auth/register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

Route::get('auth/register/verify/{confirmation_code}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);
