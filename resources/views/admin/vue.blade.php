@extends('layouts.admin.admin')

@section('css')
    <!-- Select2 -->
    <link href="{{ asset('back/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- nestable -->
    <link href="{{ asset('back/vendors/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet">
@stop
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <task-app></task-app>
    </div>
    <!-- /page content -->
    <template id="tasks-template">
        <div class="container">
            <h1>我的任务</h1>
            <li class="list-group" v-for="task in list">
                @{{ task.body }}
                <span style="color: red" @click="deleteTask(task)">x</span>
            </li>
        </div>
    </template>
@stop

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('back/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- nestable -->
    <script src="{{ asset('back/vendors/jquery-nestable/jquery.nestable.js') }}"></script>
    <!-- Vue.js -->
    {{--<script src="{{ asset('js/vue.js') }}"></script>--}}
    <script src="http://cdn.bootcss.com/vue/1.0.9/vue.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/0.6.1/vue-resource.min.js"></script>
    <script>
        Vue.component('task-app', {
            template: '#tasks-template',
            data: function () {
              return {
                  list: []
              }
            },
            created: function(){
                var vComponent = this;
                this.$http.get('api/tasks', function (data) {
                    vComponent.list = data;
                });
            },
            methods: {
                deleteTask: function (task) {
                    this.list.$remove(task);
                }
            }
        });
        new Vue({
            el:'body'
        });
    </script>
@stop