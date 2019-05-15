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
    return redirect('/article');
});

// 記事
Route::get('/article', 'ArticleController@index');
Route::get('/article/{article}', 'ArticleController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    // 投稿
    Route::post('/post/{article}', 'PostController@create');
    Route::get('/detail/{post}', 'PostController@show');
    Route::get('/edit/{post}', 'PostController@edit');
    Route::post('/update/{post}', 'PostController@update');
    Route::post('/delete/{post}', 'PostController@delete');

    // 投稿へのコメント
    Route::post('/comment/{post}', 'CommentController@create');

    // コメントでは編集・削除できないようにする
    // Route::get('/edit/{post}/{comment}', 'CommentController@edit');
    // Route::post('/update/{post}/{comment}', 'CommentController@update');
    // Route::post('/delete/{post}/{comment}', 'CommentController@delete');
});