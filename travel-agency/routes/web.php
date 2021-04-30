<?php

use Illuminate\Support\Facades\Route;

Route::GET('/', function () {
    return view('layout');
});

Route::group(['prefix' => '/cities'], function () {
    Route::GET('', 'CitiesController@index');
    Route::POST('',  'CitiesController@store');
    Route::GET('/{city}/edit',  'CitiesController@edit');
    Route::PUT('/{city}',  'CitiesController@update');
    Route::Delete('/{city}',  'CitiesController@destroy');
    Route::GET('/create',  'CitiesController@create');
    Route::GET('/{city}',  'CitiesController@show');
});

Route::group(['prefix' => '/airlines'], function () {
    Route::GET('', 'AirlinesController@index');
    Route::POST('',  'AirlinesController@store');
    Route::GET('/{airline}/edit',  'AirlinesController@edit');
    Route::PUT('/{airline}',  'AirlinesController@update');
    Route::Delete('/{airline}',  'AirlinesController@destroy');
    Route::GET('/create',  'AirlinesController@create');
    Route::GET('/{airline}',  'AirlinesController@show');
});

Route::group(['prefix' => '/flights'], function () {
    Route::GET('', 'FlightsController@index');
    Route::POST('',  'FlightsController@store');
    Route::GET('/{flight}/edit',  'FlightsController@edit');
    Route::PUT('/{flight}',  'FlightsController@update');
    Route::Delete('/{flight}',  'FlightsController@destroy');
    Route::GET('/create',  'FlightsController@create');
    Route::GET('/{flight}',  'FlightsController@show');
});
