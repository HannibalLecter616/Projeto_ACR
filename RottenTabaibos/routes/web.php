<?php

Route::get('', 'WelcomeController@getRemoteData');

Route::get('/home', 'HomeController@index');

Route::get('/search', 'ProcuraController@index');

Route::get('/browse', 'ProcuraController@initial');

Route::get('/browse/all', 'ProcuraController@all');

Route::get('/search/people/{id}/{name}', 'ProcuraController@pessoa');

Route::get('/search/popular', 'ProcuraController@popular');

Route::get('/movie/{id}', 'FilmeController@index');

Route::get('/user/{id}', 'UserController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/uptd_profile', 'UserController@edit');

Route::get('/forum', 'ForumController@index');

Route::get('/forum/discussion/{name}', 'ForumController@topic');

Route::get('/forum/discussion/{name}/{id}', 'ForumController@post');

Route::post('/users/update', 'UserController@update');

Route::resource('comments', 'CommentsController');

Route::resource('critics', 'CriticsController');

Auth::routes();


