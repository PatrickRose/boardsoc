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
Route::resource('events', 'EventsController');
Route::get(
    'library/{library}/loan',
    [
        'as' => 'loan.create',
        'uses' => 'LibraryController@loan'
    ]
);
Route::get(
    'library/loan/{loan}/confirm',
    [
        'as' => 'loan.confirm',
        'uses' => 'LibraryController@confirm'
    ]
);
Route::resource('library', 'LibraryController');
Route::resource('admin', 'AdminController');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::resource('users', 'UsersController');

Route::get(
    'games/search/{search}',
    [
        'as' => 'games.search',
        'uses' => 'GamesController@search',
    ]
);

Route::post(
    'users/{user}/games/boardgamegeek',
    [
        'as' => 'users.games.boardgamegeek',
        'uses' => 'UserGamesController@boardgamegeek'
    ]
);

Route::get(
    'users/{users}/games/{games}/delete',
    [
        'as' => 'users.games.delete',
        'uses' => 'UserGamesController@destroy'
    ]
);

Route::resource('users.games', 'UserGamesController');
Route::resource('achievements', 'AchievementsController');
Route::get('achievements/{achievement}/image', [
    'as' => 'achievements.image',
    'uses' => 'AchievementsController@image'
]);
Route::get('achievement/{achievement}/claim', [
    'as' => 'achievements.claim',
    'uses' => 'AchievementsController@claim'
]);
Route::get('achievement/{achievement}/give/{user}', [
    'as' => 'achievements.give',
    'uses' => 'AchievementsController@give'
]);
