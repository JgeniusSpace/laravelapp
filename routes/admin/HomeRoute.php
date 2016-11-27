<?php
/**
 * 首页路由
 *
 * User: Jgenius
 * Date: 2016/11/17
 * Time: 下午8:35
 */

Route::get('/', 'HomeController@index');
Route::resource('/home', 'HomeController@index');

Route::get('/vue', 'VueController@index');

Route::get('api/tasks', function () {
    return \App\Models\Task::latest()->get();
});