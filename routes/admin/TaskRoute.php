<?php
/**
 * 任务路由
 *
 * User: Jgenius
 * Date: 2016/11/17
 * Time: 下午9:00
 */
Route::resource('vue', 'VueController');

Route::get('tasks', 'VueController@ajaxTasks');