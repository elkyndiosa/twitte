<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
})->middleware('auth');
Auth::routes();
Route::get('index', 'TweetsController@index');
Route::post('store', 'TweetsController@store');
Route::get('delete/{id}', 'TweetsController@delete');
Route::post('update', 'TweetsController@update');
Route::get('show/{id}', 'TweetsController@show');