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

Route::get('/login', 'Auth\LoginController@index')->name('login');

Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@create')->name('register');

Route::post('/register', 'Auth\RegisterController@store');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/profile', 'ProfileController@index');

    Route::resource('/threads', 'ThreadController', ['only' => ['index', 'edit', 'create', 'store', 'update', 'destroy']]);

    Route::get('/threads', 'ThreadController@index');

    Route::get('/threads/ajax', 'ThreadController@getAjax')->name('dataTable');

    Route::get('/threads/{id}', 'ThreadController@view');
});