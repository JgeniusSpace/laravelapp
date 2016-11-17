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

Route::get('/home', 'HomeController@index');

Route::get('login/geetest','Auth\LoginController@getGeetest');

Route::get('/admin/home', 'Admin\HomeController@index');
Route::get('/admin/home1', 'Admin\HomeController@index');
