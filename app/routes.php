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

/**
 * Homepage Route
 */
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

/**
 * Users routes
 */
Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);

/**
 * Registration routes
 */
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

/**
 * Sessions routes
 */
Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

/**
 * Route group for API versioning
 */
Route::group(array('prefix' => 'api/v1'), function() {
  // Winery Routes
  Route::resource('wineries', 'WineriesController');
  
  // Wine Routes
  Route::resource('wines', 'WinesController');
});
