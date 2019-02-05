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
 *   MOVIES ****************************
 */

Route::get('movies', 'MovieController@index');

/**
 *   Projects
 */
Route::get('projects', 'ProjectController@index');
Route::get('projects/{id}', 'ProjectController@show');
Route::put('projects/{id}', 'ProjectController@update');
Route::post('projects', 'ProjectController@store');
Route::delete('projects/{id}', 'ProjectController@destroy');
/**
 *  Tags
 */

Route::get('tags', 'TagController@index');
/**
 * *************************************************************************
 * ***     Users - - -   some Test Cases / later protected by passport   ***
 */
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::put('users/{id}', 'UserController@update');
Route::post('users', 'UserController@store');
Route::delete('users/{id}', 'UserController@destroy');




Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');


/** ***************************************************
 * * * * * * * *  SEARCH * * * * * * * * * * * * *
 */

Route::get('usersearch/{name}', 'UserController@searchname');
