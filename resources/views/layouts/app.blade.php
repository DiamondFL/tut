<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Edubeanz"/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <link rel="icon" href="{{asset('')}}assets/images/favicon.ico">
    <title>Portalbeanzvn - Education @yield('title')</title>
    <meta content="Kết nối tất cả">
    <link rel="stylesheet" href="{{asset('')}}assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-core.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-theme.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/custom.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/skins/white.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-icons/font-awesome/css/font-awesome.min.css">
    @stack('css')
    @yield('css')
</head>
<body class="page-body skin-black">
<div class="page-container">
    @include('layouts.sidebar')
    <div class="main-content">
        <div class="row">
            @include('layouts.profile-notifications')
            @include('layouts.raw-links')
        </div>
        <hr/>
        @include('layouts.alerts.index')
        @yield('content')
    </div>
    @yield('container')
    @include('vocabularies.search')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('')}}assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="{{asset('')}}assets/js/rickshaw/rickshaw.min.css">
<!-- Bottom scripts (common) -->
<script src="{{asset('')}}assets/js/gsap/TweenMax.min.js"></script>
<script src="{{asset('')}}assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="{{asset('')}}assets/js/bootstrap.js"></script>
<script src="{{asset('')}}assets/js/joinable.js"></script>
<script src="{{asset('')}}assets/js/resizeable.js"></script>
<script src="{{asset('')}}assets/js/neon-api.js"></script>
<script src="{{asset('')}}assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<!-- Imported scripts on this page -->
<script src="{{asset('')}}assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="{{asset('')}}assets/js/jquery.sparkline.min.js"></script>
<script src="{{asset('')}}assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="{{asset('')}}assets/js/rickshaw/rickshaw.min.js"></script>
<script src="{{asset('')}}assets/js/raphael-min.js"></script>
<script src="{{asset('')}}assets/js/morris.min.js"></script>
<script src="{{asset('')}}assets/js/toastr.js"></script>
{{--<script src="{{asset('')}}assets/js/neon-chat.js"></script>--}}
<script src="{{asset('')}}assets/js/neon-custom.js"></script>
<script src="{{asset('')}}vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{asset('')}}vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script>
    var options = {

        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
//        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',

        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
//        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    $('.ckeditor').ckeditor(options);
</script>


<!-- Demo Settings -->
<script src="{{asset('')}}assets/js/neon-demo.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{asset('bower_components/fabric.js/dist/fabric.min.js')}}"></script>
{{--<script src="{{asset('bower_components/fabric.js/dist/fabric.require.js')}}"></script>--}}
@stack('js')
@yield('js')
{{--<script>--}}
{{--$('#formSearchVocabulary').formFilter($('.searchVol'), $('#searchVocabularyTable'));--}}
{{--</script>--}}
<script>
    $(document).on('click', '.destroyBtn', function (e) {
        var ok = confirm('Are you sure?');
        if(ok === false) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>


