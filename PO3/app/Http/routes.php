<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/article/add', 'ArticleController@index');
Route::post('/article/add', 'ArticleController@store');
Route::get('/article/delete/{article}', 'ArticleController@delete');
Route::delete('/article/deleteNow/{article}', 'ArticleController@destroy');

Route::post('/vote/up/{article}', 'VoteController@up');
Route::post('/vote/down/{article}', 'VoteController@down');

Route::get('/comments/{article}', 'CommentController@index');
Route::post('/comments/add', 'CommentController@store');
Route::get('/comment/delete/{comment}', 'CommentController@delete');
Route::delete('/comment/deleteNow/{comment}', 'CommentController@destroy');