<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Edubeanz" />
    <meta name="author" content="" />
    <link rel="icon" href="{{asset('frontd')}}/images/favicon.ico">
    <title>Edubeanz | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('frontd')}}/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="{{asset('frontd')}}/css/neon.css">

    {{--<link rel="stylesheet" href="{{asset('')}}assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">--}}
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.css">

    {{--<link rel="stylesheet" href="{{asset('')}}assets/css/neon-theme.css">--}}
    {{--<link rel="stylesheet" href="{{asset('')}}assets/css/custom.css">--}}
    {{--<link rel="stylesheet" href="{{asset('')}}assets/css/neon-forms.css">--}}

    <script src="{{asset('frontd')}}/js/jquery-1.11.3.min.js"></script>
    @stack('head')
    @yield('css')
</head>
<body>
{{--<div class="wrap">--}}
    <!-- Logo and Navigation -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header class="site-header">
                    <section class="site-logo">
                        <a href="/">
                            <h1><strong>Edubeanz</strong></h1>
                        </a>
                    </section>
                    @include('edu::layouts.nav')
                </header>
            </div>
        </div>
    </div>
    <!-- Main Slider -->
    <div class="container">
        @include('layouts.alerts.index')
        @yield('container')
    </div>

    <!-- Site Footer -->
{{--    @include('edu::layouts.footer')--}}
{{--</div>--}}
<!-- Bottom scripts (common) -->
<script src="{{asset('frontd')}}/js/gsap/TweenMax.min.js"></script>
<script src="{{asset('frontd')}}/js/bootstrap.js"></script>
<script src="{{asset('frontd')}}/js/joinable.js"></script>
<script src="{{asset('frontd')}}/js/resizeable.js"></script>
<script src="{{asset('frontd')}}/js/neon-slider.js"></script>
<!-- JavaScripts initializations and stuff -->
<script src="{{asset('frontd')}}/js/neon-custom.js"></script>

{{--<script src="{{asset('')}}assets/js/gsap/TweenMax.min.js"></script>--}}
{{--<script src="{{asset('')}}assets/js/bootstrap.js"></script>--}}
{{--<script src="{{asset('')}}assets/js/joinable.js"></script>--}}
{{--<script src="{{asset('')}}assets/js/resizeable.js"></script>--}}
{{--<script src="{{asset('')}}assets/js/neon-slider.js"></script>--}}
<!-- JavaScripts initializations and stuff -->
{{--<script src="{{asset('')}}assets/js/neon-custom.js"></script>--}}

@yield('js')
@stack('js')

</body>
</html>