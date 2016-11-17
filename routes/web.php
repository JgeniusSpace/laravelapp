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


/**
 * 后台路由
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    // 首页路由
    require (__DIR__.'/admin/HomeRoute.php');
    // 菜单路由
    require (__DIR__.'/admin/MenuRoute.php');
});