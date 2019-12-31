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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['as' => 'category.', 'prefix' => 'category'], function() {
        Route::get('index', 'CategoryController@index')->name('index');
        Route::get('create', 'CategoryController@create')->name('create');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
        Route::put('update', 'CategoryController@update')->name('update');
    });

    Route::group(['as' => 'content.', 'prefix' => 'content'], function() {
        Route::get('index', 'ContentController@index')->name('index');
        Route::get('create', 'ContentController@create')->name('create');
        Route::post('store', 'ContentController@store')->name('store');
        Route::get('edit/{id}', 'ContentController@edit')->name('edit');
        Route::put('update', 'ContentController@update')->name('update');
    });

    Route::group(['as' => 'content.', 'prefix' => 'content'], function() {

    });
});
