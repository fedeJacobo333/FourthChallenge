<?php

use Illuminate\Support\Facades\Route;

Route::GET('/', function () {
    return view('welcome');
});

//cities enpoints

Route::GET('/cities', 'App\Http\Controllers\CitiesController@index');

Route::POST('/cities',  'App\Http\Controllers\CitiesController@store');

Route::GET('/cities/{city}/edit',  'App\Http\Controllers\CitiesController@edit');

Route::PUT('/cities/{city}',  'App\Http\Controllers\CitiesController@update');

Route::Delete('/cities/{city}',  'App\Http\Controllers\CitiesController@destroy');

Route::GET('/cities/create',  'App\Http\Controllers\CitiesController@create');

Route::GET('/cities/{city}',  'App\Http\Controllers\CitiesController@show');

//airlines endpoints
Route::GET('/airlines', 'App\Http\Controllers\AirlinesController@index');

Route::POST('/airlines',  'App\Http\Controllers\AirlinesController@store');

Route::GET('/airlines/{airline}/edit',  'App\Http\Controllers\AirlinesController@edit');

Route::PUT('/airlines/{airline}',  'App\Http\Controllers\AirlinesController@update');

Route::Delete('/airlines/{airline}',  'App\Http\Controllers\AirlinesController@destroy');

Route::GET('/airlines/create',  'App\Http\Controllers\AirlinesController@create');

Route::GET('/airlines/{airline}',  'App\Http\Controllers\AirlinesController@show');
