<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('style.css')}}">
    </head>
    <body style="padding:70px 0;">
        @include('eco::layout.navigation')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('eco::layout.navFooter')
        @include('eco::layout.modal.cart')
        <script src="{{asset('jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('')}}session.js"></script>
        {{--@if(auth()->check())--}}
            {{--<script type="text/javascript" src="http://127.0.0.1:3000/socket.io/socket.io.js"></script>--}}
            {{--<script type="text/javascript" src="{{asset('')}}chat.js"></script>--}}
        {{--@endif--}}
{{--<script src="http://127.0.0.1:8080/socket.io/socket.io.js" >
</script>
<script type="text/javascript" src="{{asset('')}}client.js">
</script>--}}
    </body>
</html>