<?php
/**
 * 任务路由
 *
 * User: Jgenius
 * Date: 2016/11/17
 * Time: 下午9:00
 */
Route::get('/vue', 'VueController@index');

Route::get('api/tasks', function () {
    return \App\Models\Task::latest()->get();
});