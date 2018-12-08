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

Route::get('/', function () {
    return view('welcome');
});



/**
 * ***     Users - - -   some Test Cases / later protected by passport   ***
 */
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
//Route::post('users/{id}', 'UserController@update');
//Route::post('users', 'UserController@store');
//Route::delete('users/{id}', 'UserController@destroy');


Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
