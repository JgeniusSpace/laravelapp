@extends('layouts.admin.admin')

@section('css')
    <!-- Select2 -->
    <link href="{{ asset('back/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- nestable -->
    <link href="{{ asset('back/vendors/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{ asset('js/layui/css/layui.css') }}">--}}
    <meta id="token" name="token" value="{{ csrf_token() }}">
@stop
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <task-app></task-app>
    </div>
    <!-- /page content -->
    <template id="tasks-template">
        <div class="container">
            <form class="form-group" @submit="createTask">
            {{ csrf_field() }}
                <input type="text" class="form-control" v-model="notes">
                <button class="btn btn-success btn-block">提交</button>
            </form>
            <h1>我的任务(@{{taskCount}})</h1>
            <li class="list-group" v-for="task in tasks | orderBy 'id' -1">
                @{{ task.body }}
                <span class="glyphicon glyphicon-remove" style="cursor:pointer; color: red;" @click="deleteTask(task)"></span>
            </li>
        </div>
    </template>
@stop

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('back/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- nestable -->
    <script src="{{ asset('back/vendors/jquery-nestable/jquery.nestable.js') }}"></script>
    <!-- layui -->
    <script src="{{ asset('js/layui/layui.js') }}"></script>
    <!-- Vue.js -->
    {{--<script src="{{ asset('js/vue.js') }}"></script>--}}
    <script src="http://cdn.bootcss.com/vue/1.0.9/vue.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/0.6.1/vue-resource.min.js"></script>
    <script>
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        var resource = Vue.resource('vue/{id}');
        Vue.component('task-app', {
            template: '#tasks-template',
            data: function () {
              return {
                  tasks: [],
                  notes: '',
                  taskCount: ''
              }
            },
            created: function(){
                this.$http.get('tasks', function (data) {
                    this.tasks = data;
                    this.taskCount = data.length;
                }.bind(this));
            },
            methods: {
                deleteTask: function (task) {
                    resource.delete({id:task.id}, function (response) {
                        layui.use(['layer', 'form'], function(){
                            var layer = layui.layer;
                            layer.msg(response.message);
                        });
                    });
                    this.taskCount --;
                    this.tasks.$remove(task);
                },
                createTask: function (e) {
                    e.preventDefault();
                    this.$http.post('vue', {body: this.notes}, function (response) {
                        if (response.status == 'success') {
                            this.tasks.push(response.task);
                            this.notes = '';
                            this.taskCount ++;
                        }
                    }.bind(this));
                }
            }
        });
        new Vue({
            el:'body'
        });
    </script>
@stop