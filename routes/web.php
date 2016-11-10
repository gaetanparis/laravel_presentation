<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {

    Route::resource('/profil', 'ProfilController@index');
    Route::resource('ad', 'AdController');
    Route::resource('favourite', 'FavouriteController');
    Route::get('logout', 'HomeController@logout');
});
