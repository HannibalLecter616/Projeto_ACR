<?php

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('', 'WelcomeController@getRemoteData');

Route::get('/home', 'HomeController@index');

Route::get('/search', 'ProcuraController@index');

Route::get('/browse', 'ProcuraController@initial');

Route::get('/search/people/{id}/{name}', 'ProcuraController@pessoa');

Route::get('/search/popular', 'ProcuraController@popular');

Route::get('/movie/{id}', 'FilmeController@index');

Route::get('/user/{id}', 'UserController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('comments', 'CommentsController');

Auth::routes();


