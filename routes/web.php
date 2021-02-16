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
/*
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

//練習用課題ページ
Route::get('kadai', 'KadaiController@kadai_index')->name('kadai');
Route::get('kadai/create', 'KadaiController@add');
Route::post('kadai/create', 'KadaiController@create');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Topcontroller@index')->name('top');

//投稿
Route::get('post', 'PostController@post_index')->name('post');
Route::get('post/create', 'PostController@add');
Route::post('post/create', 'PostController@create');
Route::get('post/edit', 'PostController@edit');
Route::post('post/edit', 'PostController@update');
Route::get('post/delete', 'PostController@delete');
Route::resource('post', 'PostController', ['only' => ['post_index' ,'show']]);

//マイページ
Route::get('user', 'UserController@user_index')->name('mypage');
Route::get('user/edit', 'UserController@edit');
Route::post('user/edit', 'UserController@update');
Route::get('/user/{user}', 'UserController@show');
//プロフィール
Route::get('profile/create', 'ProfileController@add');
Route::post('profile/create', 'ProfileController@create');
Route::post('profile/edit', 'ProfileController@update');
Route::get('profile/edit', 'ProfileController@edit');

//問い合わせフォーム
Route::get('/contact', 'FormController@index')->name('contact');//入力
Route::post('/contact/confirm', 'FormController@confirm');//確認
Route::post('/contact/thanks', 'FormController@send');//送信

//いいね
Route::post('/post/{post}/likes', 'LikesController@store');
Route::post('/post/{post}/likes/{like}', 'LikesController@destroy');