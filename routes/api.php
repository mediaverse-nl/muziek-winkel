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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('songs', 'Api\SongsController@index');

        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::get('song/{id}', 'Api\StreamController@show');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('songs', 'Api\SongsController@store')->middleware('isAdmin');

    Route::post('albums', 'Api\AlbumsController@store')->middleware('isAdmin');
    Route::get('albums/{id}', 'Api\AlbumsController@show');

    Route::get('artists', 'Api\ArtistsController@index')->middleware('isAdmin');
    Route::get('artists/{id}', 'Api\ArtistsController@show')->middleware('isAdmin');
    Route::post('artists', 'Api\ArtistsController@store')->middleware('isAdmin');

    Route::get('users', 'Auth\UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'Auth\UserController@show')->middleware('isAdminOrSelf');
});
