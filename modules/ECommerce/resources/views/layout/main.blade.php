<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        {{HTML::style('bootstrap/css/bootstrap.css')}}
        {{HTML::style('bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('style.css')}}
    </head>
    <body style="padding:70px 0;">
        {{HTML::script('jquery.min.js')}}
        {{HTML::script('bootstrap/js/bootstrap.js')}}
        {{HTML::script('ckeditor/ckeditor.js')}}
        <script type="text/javascript" src="{{asset('')}}session.js"></script>
        @if(Auth::check())
            <script type="text/javascript" src="http://127.0.0.1:3000/socket.io/socket.io.js"></script>
            <script type="text/javascript" src="{{asset('')}}chat.js"></script>

        @endif
        @include('layout.navigation')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layout.navFooter')
        @include('layout.modal.cart')
{{--<script src="http://127.0.0.1:8080/socket.io/socket.io.js" >
</script>
<script type="text/javascript" src="{{asset('')}}client.js">
</script>--}}
    </body>
</html>