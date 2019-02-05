<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register', 'API\PassportController@register');

Route::post('login', 'API\PassportController@login');

// protected routes


Route::group(['middleware'=>'auth:api'], function(){
   Route::get('profile', 'API\PassportController@getProfile');

    /**
     *   Projects
     */
    Route::get('projects', 'ProjectController@index');
    Route::get('projects/{id}', 'ProjectController@show');
    Route::put('projects/{id}', 'ProjectController@update');
    Route::post('projects', 'ProjectController@store');
    Route::delete('projects/{id}', 'ProjectController@destroy');

    /**
     * ***     Users - - -   some Test Cases / later protected by passport   ***
     */
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::put('users/{id}', 'UserController@update');
    Route::post('users', 'UserController@store');
    Route::delete('users/{id}', 'UserController@destroy');

});
