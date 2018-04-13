@extends('layout.main')
    @section('title')
     Trang chủ
    @stop
    @section('content')
        @if(Session::has('global'))
            <p>{{Session::get('global')}}</p>
        @endif
        @if(Auth::check())
            Xin chào, {{Auth::user()->fullname}}
            <hr>

        @else
        <p>Bạn chưa đăng nhập hệ thống</p>
        @endif
    @stop