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

//Route::post('login', 'API\PassportController@login');

// protected routes


Route::group(['middleware'=>'auth:api'], function(){
   Route::get('profile', 'API\PassportController@getProfile');

    /**
     * ***     Users - - -   some Test Cases / later protected by passport   ***
     */
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users/{id}', 'UserController@update');
    Route::post('users', 'UserController@store');
    Route::delete('users/{id}', 'UserController@destroy');

});
