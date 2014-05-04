<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * Users routes
 */
Route::resource('users', 'UsersController');


/**
 * Sessions routes
 *
 * TODO Setup user authentication.
 *
 */
//Route::get('login', 'SessionsController@create'); // Login alias route
//Route::get('logout', 'SessionsController@destroy'); // Logout alias route
//Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]); // Sessions resource routes

/**
 * Route group for API versioning
 */
Route::group(array('prefix' => 'api/v1'), function() {
  // Winery Routes
  Route::resource('wineries', 'WineriesController');
  
  // Wine Routes
  Route::resource('wines', 'WinesController');
});
