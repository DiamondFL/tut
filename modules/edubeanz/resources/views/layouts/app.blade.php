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
    <link rel="stylesheet" href="{{asset('frontd')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('frontd')}}/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="{{asset('frontd')}}/css/neon.css">
    <script src="{{asset('frontd')}}/js/jquery-1.11.3.min.js"></script>
    <!--[if lt IE 9]><script src="{{asset('frontd')}}/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('head')
</head>
<body>
<div class="wrap">
    <!-- Logo and Navigation -->
    <div class="site-header-container container">
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
    @include('edu::layouts.footer')
</div>
<!-- Bottom scripts (common) -->
<script src="{{asset('frontd')}}/js/gsap/TweenMax.min.js"></script>
<script src="{{asset('frontd')}}/js/bootstrap.js"></script>
<script src="{{asset('frontd')}}/js/joinable.js"></script>
<script src="{{asset('frontd')}}/js/resizeable.js"></script>
<script src="{{asset('frontd')}}/js/neon-slider.js"></script>
<!-- JavaScripts initializations and stuff -->
<script src="{{asset('frontd')}}/js/neon-custom.js"></script>
@stack('js')
</body>
</html>