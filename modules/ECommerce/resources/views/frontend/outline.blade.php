<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>demo</title>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/top.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/hearder.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/menutab.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/leftcontent.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/centercontent.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/rightcontent.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}css/navigation.css"/>
</head>
<body>

    <div class="main">

        <!-- header:kết thúc -->
        @include('frontend.includes.header')
        <!--------------------------------- content:bắt đầu ------------------------>
        <div class="content">
            <!-- MENU -->
            @include('frontend.includes.menu')

            <!---------------navigation------------>
            <div class="navigation"> Navigation: <a href="/">Trang chủ</a>&raquo; <a href="Sanpham.html">Sản phẩm</a>&raquo; <span class="current">Masstel</span> </div>

            <!-------------- left content----------------->
            @include('frontend.includes.left_content')

            <!-------------- center content----------------->

            @yield('content')

            <!-------------- right content----------------->

            @include('frontend.includes.right_content')

        </div>

        <!------------------------------------- content:kết thúc ---------------------------------------->

        <div class="clr"></div>
        <!------------------------------------- footer:bắt đầu---------------------------------------->

        @include('frontend.includes.footer')
        <!------------------------------------- footer:kết thúc ---------------------------------------->
    </div>
</body>
</html>


