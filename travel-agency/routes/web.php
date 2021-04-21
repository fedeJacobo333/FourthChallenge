<?php

use Illuminate\Support\Facades\Route;

Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/cities', 'App\Http\Controllers\CitiesController@index');

Route::POST('/cities',  'App\Http\Controllers\CitiesController@store');

Route::GET('/cities/{city}/edit',  'App\Http\Controllers\CitiesController@edit');

Route::PUT('/cities/{city}',  'App\Http\Controllers\CitiesController@update');

Route::Delete('/cities/{city}',  'App\Http\Controllers\CitiesController@destroy');

Route::GET('/cities/create',  'App\Http\Controllers\CitiesController@create');

Route::GET('/cities/{city}',  'App\Http\Controllers\CitiesController@show');
