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
    Route::get('post/delete', 'Admin\ProfileController@delete');
    Route::get('post', 'Admin\ProfileController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
