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
Route::get('/test', 'ArticleController@get_api');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    // 投稿
    Route::post('/post/store', 'PostController@store');
    Route::get('/detail/{post}', 'PostController@show');
    Route::get('/post/edit/{post}', 'PostController@edit');
    Route::post('/post/update/{post}', 'PostController@update');
    Route::post('/post/delete/{post}', 'PostController@delete');

    // ユーザーコメント表示
    Route::get('user/{user}', 'UserController@show');

    // 投稿へのコメント
    Route::post('/comment/create/{post}', 'CommentController@create');

    Route::post('/like/store/{post}', 'LikeController@store');
    Route::post('/like/delete/{post}', 'LikeController@delete');

});