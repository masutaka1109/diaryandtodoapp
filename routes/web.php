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

Route::get('/', 'CalendarController@show');

Route::resource('diaries', 'DiariesController', ['only' => ['store', 'destroy']]);

Route::get('calendar', 'CalendarController@show')->name('calendar');

Route::get('diary/{id}', 'DiariesController@show')->name('diary.show'); //日記の詳細ページ


Route::get('read/{date}', 'DiariesController@index')->name('read.get'); //その日に投稿された日記を読むページ

Route::get('search', 'SearchController@show')->name('search.show');
Route::get('search/result', 'SearchController@result')->name('search.result');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{user}'], function () {
        Route::get('edit', 'UsersController@edit')->name('users.edit');
    });
   
    Route::get('write/{date}', 'DiariesController@showwrite')->name('write.get');
    Route::post('write', 'DiariesController@store')->name('diary.store'); //その日の日記を投稿するためのページ
    Route::get('diary/{id}/edit', 'DiariesController@edit')->name('diary.edit'); //日記の編集ページ
    Route::put('diary/{id}', 'DiariesController@update')->name('diary.update'); //日記を編集するアクション

    Route::group(['prefix' => 'diaries/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
});

Route::group(['prefix' => 'users/{user}'], function () {
    Route::get('diaries', 'DiariesController@users_diaries')->name('users.diaries');
    Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
});

Route::resource('users', 'UsersController', ['only' => ['index', 'show','update']]);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
