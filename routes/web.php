<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::redirect('/', 'users')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('items')
        ->name('items.')
        ->group(function () {
            Route::get('/', 'ItemController@index')->name('list');                 // 一覧画面表示
            Route::get('/create', 'ItemController@create')->name('create');        // 作成画面表示
            Route::post('/', 'ItemController@store')->name('store');               // 作成
            Route::get('/{item_id}/edit', 'ItemController@edit')->name('edit');    // 更新画面表示
            Route::patch('/{item_id}', 'ItemController@update')->name('update');    // 更新
            Route::delete('/{item_id}', 'ItemController@destroy')->name('destroy');// 削除
    });

    Route::prefix('users')
        ->name('users.')
        ->group(function () {
            Route::get('/', 'UserController@index')->name('list');                 // 一覧画面表示
            Route::get('/create', 'UserController@create')->name('create');        // 作成画面表示
            Route::post('/', 'UserController@store')->name('store');               // 作成
            Route::get('/{user_id}/edit', 'UserController@edit')->name('edit');    // 更新画面表示
            Route::patch('/{user_id}', 'UserController@update')->name('update');    // 更新
            Route::delete('/{user_id}', 'UserController@destroy')->name('destroy');// 削除
    });
});