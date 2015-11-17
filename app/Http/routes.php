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
        return view('auth/login');
});

//Route::resource('messages', 'MessagesController', ['only' => ['index', 'store', 'show']]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/login', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// User Admin routes...
Route::get('admin', ['middleware' => 'auth', 'uses' =>  'UserController@admin']);
Route::get('userchat', ['middleware' => 'auth', 'uses' => 'UserController@index']);
Route::get('ban', 'UserController@viewBan');
Route::post('ban', 'UserController@banUser');

//Send Massage Route...
Route::post('sendmessage', 'SocketController@sendMessage');

