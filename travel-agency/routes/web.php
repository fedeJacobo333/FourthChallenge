<?php

use Illuminate\Support\Facades\Route;

Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/Cities', 'App\Http\Controllers\CitiesController@index');

Route::POST('/Cities',  'App\Http\Controllers\CitiesController@store');

Route::GET('/Cities/{city}/edit',  'App\Http\Controllers\CitiesController@edit');

Route::PUT('/Cities/{city}',  'App\Http\Controllers\CitiesController@update');

Route::GET('/Cities/{city}/delete',  'App\Http\Controllers\CitiesController@destroy');

Route::GET('/Cities/create',  'App\Http\Controllers\CitiesController@create');

Route::GET('/Cities/{city}',  'App\Http\Controllers\CitiesController@show');
