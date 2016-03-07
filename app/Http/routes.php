<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['prefix' => 'api'], function () {
  Route::group(['prefix' => 'v1'], function () {
    Route::get('users', ['as' => 'api.v1.users.index', 'uses' => 'Api\V1\UsersController@index']);
    Route::get('users/{id}', ['as' => 'api.v1.users.show', 'uses' => 'Api\V1\UsersController@show']);
  });
});