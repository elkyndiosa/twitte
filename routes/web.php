<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::get('index', 'TweetsController@index');
Route::post('create', 'TweetsController@create');
Route::get('delete/{id}', 'TweetsController@delete');
Route::post('update', 'TweetsController@update');
