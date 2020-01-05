<?php

Route::get('', 'WelcomeController@getRemoteData');

Route::get('/home', 'HomeController@index');

Route::get('/search', 'ProcuraController@index');

Route::get('/browse', 'ProcuraController@initial');

Route::get('/browse/all', 'ProcuraController@all');

Route::get('/search/people/{id}/{name}', 'ProcuraController@pessoa');

Route::get('/search/popular/{number}', 'ProcuraController@popular');

Route::get('/search/recent/{number}', 'ProcuraController@recent');

Route::get('/search/top/{number}', 'ProcuraController@top');

Route::get('/movie/{id}', 'FilmeController@index');

Route::get('/user/{id}', 'UserController@index');

Route::get('/user/{id}/reviews', 'UserController@reviews');

Route::get('/user/{id}/posts', 'UserController@posts');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/uptd_profile', 'UserController@edit');

Route::get('/forum', 'ForumController@index');

Route::get('/forum/discussion/{name}', 'ForumController@topic');

Route::get('/forum/discussion/{name}/{id}', 'ForumController@post');

Route::post('/users/update', 'UserController@update');

Route::post('/remove/comments/{id}', 'CommentsController@destroy');

Route::post('/remove/critics/{id}', 'CriticsController@destroy');

Route::get('/post/like/', 'ForumController@addLike');

Route::get('/post/dislike/', 'ForumController@addDislike');

Route::post('/forum/discussion/reply/like/{id}', 'ReplyController@addLike');

Route::post('/forum/discussion/reply/dislike/{id}', 'ReplyController@addDislike');

Route::resource('replies', 'ReplyController');

Route::resource('posts', 'ForumController');

Route::resource('comments', 'CommentsController');

Route::resource('critics', 'CriticsController');

Auth::routes();


Route::get('/comment/add', 'CommentsController@store');