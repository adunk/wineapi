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

# Route group to provide CSRF protection in one go
Route::group(['before' => 'csrf'], function() {
  
  # Homepage Route
  Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
  
  # User routes
  Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
  
  # Registration routes
  Route::get('/register', 'RegistrationController@create')->before('guest');
  Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
  
  # Profile routes
  Route::resource('profiles', 'ProfilesController', ['only' => ['show', 'create', 'store', 'edit', 'update']]);
  
  # Session routes
  Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
  Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
  Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
  
});

# Route group for API versioning
Route::group(['prefix' => 'api/v1', 'before' => 'csrf'], function() {
  # Wines by Winery
  Route::get('wineries/{id}/wines', 'WinesController@index');
  
  # Winery Routes
  Route::resource('wineries', 'WineriesController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
  
  # Wine Routes
  Route::resource('wines', 'WinesController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});
