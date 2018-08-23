<?php


Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/--home', ['as' => 'home', 'uses' => 'HomeController@index']);
