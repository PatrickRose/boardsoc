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

Route::get(
    '/',
    [
        'as' => 'home',
        'uses' => 'StaticPagesController@index'
    ]
);
Route::get(
    'about',
    [
        'as' => 'about',
        'uses' => 'StaticPagesController@about'
    ]
);
Route::resource(
    'events',
    'EventsController@index'
);
Route::resource(
    'library',
    'LibraryController'
);
Route::resource(
    'admin',
    'AdminController'
);
Route::controller(
    'auth',
    'SessionsController'
);
Route::resource('users', 'UsersController');