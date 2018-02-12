<!DOCTYPE html>
<html>

<head>
    <title>Six Blog - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    @stack('meta')
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}dist/lib/css/dataTables.bootstrap.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/themes/flat-blue.css">
    <link rel="stylesheet" href="{{asset('build/eonasdan-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('')}}assets/css/order-ui.css">
    @stack('css')
</head>

<body class="flat-blue">
@stack('head')
<div class="app-container">
    <div class="row content-container">
        @include('_vendor._component.navbar')
        @include('_vendor._component.sidebar')
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                {{--@include('_vendor.includes.alert.index')--}}

                @yield('content')


            </div>
        </div>
    </div>
    <footer class="app-footer">
        <div class="wrapper">
            <span class="pull-right">2.1 <a href="{{asset('')}}}#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
        </div>
    </footer>
</div>
        <!-- Javascript Libs -->
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/Chart.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/bootstrap-switch.min.js"></script>

        <script type="text/javascript" src="{{asset('')}}dist/lib/js/jquery.matchHeight-min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/select2.full.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/ace/ace.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/ace/mode-html.js"></script>
        <script type="text/javascript" src="{{asset('')}}dist/lib/js/ace/theme-github.js"></script>
        <!-- Javascript -->
        <script type="text/javascript" src="{{asset('')}}js/app.js"></script>

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


        {{--<script>--}}
            {{--CKEDITOR.replace( 'editor', {--}}
                {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
                {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files'--}}
            {{--});--}}
        {{--</script>--}}
@yield('bot')
@stack('scripts')
</body>

</html>
