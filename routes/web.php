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
////basis
//Route::get('/registeren', 'HomeController@index')->name('register');
//Route::get('/login', 'HomeController@index')->name('login');
//
//Route::get('/albums', 'HomeController@index')->name('album.index');
//Route::get('/albums/{id}', 'HomeController@index')->name('album.show');
//
//Route::get('/library/albums/', 'HomeController@index')->name('library.index');
//Route::get('/library/albums/{id}', 'HomeController@index')->name('library.show');
//
////admin
//Route::get('/artists', 'HomeController@index')->name('album.index');
//Route::get('/albums', 'HomeController@index')->name('album.index');

Route::get('/{any?}', function (){
    return view('layouts.app');
})->where('any', '^(?!api\/)[\/\w\.-]*');



