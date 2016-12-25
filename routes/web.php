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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('like/{id}', 'LikeController@store')->name('like');
Route::get('unlike/{id}', 'UnlikeController@store')->name('unlike');
Route::get('person/destroy/{id}', 'PersonController@destroy')->name('person.destroy');
