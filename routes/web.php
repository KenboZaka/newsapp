<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 記事
Route::get('/article', 'ArticleController@index');
Route::get('/article/{article}', 'ArticleController@show');
// 投稿
Route::post('/post/{article}', 'PostController@create');
Route::get('/detail/{post}', 'PostController@show');
Route::get('/edit/{post}', 'PostController@edit');
Route::post('/update/{post}', 'PostController@update');
Route::post('/delete/{post}', 'PostController@delete');
// 投稿へのコメント
Route::post('/comment/{post}', 'CommentController@create');
Route::get('/edit/{post}/{comment}', 'CommentController@edit');
Route::post('/update/{comment}', 'CommentController@update');
Route::post('/delete/{comment}', 'CommentController@delete');
