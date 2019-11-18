<?php

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('', 'WelcomeController@getRemoteData');

Route::get('/home', 'HomeController@index');

Route::get('/search', 'ProcuraController@index');

Route::get('/movie/{id}', 'FilmeController@index');

Auth::routes();


