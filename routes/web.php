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
    return view('home');
});

Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function() {
    Route::get('post/create', 'Admin\PostController@add');
    Route::post('post/create', 'Admin\PostController@create');
    Route::get('post', 'Admin\PostController@index');
    Route::get('post/edit', 'Admin\PostController@edit');
    Route::post('post/edit', 'Admin\PostController@update');
    Route::get('post/delete', 'Admin\PostController@delete');
});

Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Topcontroller@index')->name('top');

//投稿
Route::group(['middleware' => 'auth'], function() {
   Route::get('post', 'PostController@post_index')->name('post');
   Route::get('post/create', 'PostController@add');
   Route::post('post/create', 'PostController@create');
   Route::get('post/edit', 'PostController@edit');
   Route::post('post/edit', 'PostController@update');
   Route::get('post/delete', 'PostController@delete');
   Route::get('post/show', 'PostController@show');
});

//プロフィール
Route::get('profile/create', 'ProfileController@add')->name('profile');
Route::get('profile/edit', 'ProfileController@edit');
Route::post('profile/create', 'ProfileController@create');
Route::post('profile/edit', 'ProfileController@update');

//いいね
Route::post('/posts/{post}/likes', 'LikesController@store');
Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');
