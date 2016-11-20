<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('back/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('back/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('back/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
<!-- jQuery custom content scroller -->
    <link href="{{ asset('back/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
<!-- Custom Theme Style -->
    <link href="{{ asset('back/build/css/custom.min.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('layouts.admin.sidebar')

        @include('layouts.admin.header')

        @yield('content')

        @include('layouts.admin.footer')
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('back/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('back/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('back/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('back/vendors/nprogress/nprogress.js') }}"></script>
<!-- jQuery custom content scroller -->
<script src="{{ asset('back/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('back/build/js/custom.min.js') }}"></script>
@yield('js')

</body>
</html>