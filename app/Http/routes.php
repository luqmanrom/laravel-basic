<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::post('/user', 'UserController@create');


Route::get('/users', 'UserController@index');

Route::post('/login', 'UserController@login');