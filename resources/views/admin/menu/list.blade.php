@extends('layouts.admin.admin')

@section('css')
<!-- Select2 -->
<link href="{{ asset('back/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<!-- nestable -->
<link href="{{ asset('back/vendors/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet">
@stop
@section('content')
@inject("menus", "App\Repositories\Presenter\MenuPresenter")
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>菜单管理</h3>
            </div>
        </div>

        <div class="clearfix"></div>


        @include('flash::message')

        @if (count ($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- left panel -->
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pop Overs <small>Sessions</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content bs-example-popovers">
                        <div class="dd" id="nestable_list_3">
                            <ol class="dd-list">
                                {!! $menus->getMenuList($menuList) !!}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end left panel -->

            {{-- 5.3 中必须使用双括号 --}}
            @permission(('admin.menus.add'))
            <!-- right panel -->
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Basic Elements <small>different form elements</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form action="{{ url('admin/menus') }}" method="post" class="form-horizontal form-label-left" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单名称</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="菜单名称">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单图标</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="icon" name="icon" value="{{ old('icon') }}" class="form-control" placeholder="菜单图标">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">父级菜单</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select id="parent_id" name="parent_id" class="select2_single form-control" tabindex="-1">
                                        {!! $menus->getMenu($menu) !!}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单链接</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="url" name="url" value="{{ old('url') }}" class="form-control" placeholder="菜单链接">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单高亮</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="heightlight_url" name="heightlight_url" value="{{ old('heightlight_url') }}" class="form-control" placeholder="菜单高亮">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单排序</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="sort" name="sort" type="text" value="{{ old('sort') }}" class="form-control" placeholder="菜单排序">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="#" class="btn btn-default">取消</button>
                                    <button type="submit" class="btn btn-success">确认</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- end right panel -->
            @endpermission
        </div>
    </div>
</div>
<!-- /page content -->
@stop

@section('js')
<!-- Select2 -->
<script src="{{ asset('back/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- nestable -->
<script src="{{ asset('back/vendors/jquery-nestable/jquery.nestable.js') }}"></script>
{{-- layui --}}
<script src="{{ asset('js/layui/layui/layui.js') }}"></script>
{{-- 自定义js --}}
<script src="{{ asset('back/js/menu.js') }}"></script>
<script>
    $(document).ready(function() {
        // Select2
        $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        // nestable
        $('#nestable_list_3').nestable();

        MenuList.init();

    });
</script>



@stop