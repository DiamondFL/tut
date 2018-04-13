@extends('layout.main')
@section('title')
Sản phẩm
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @include('product.listProducts')
@endsection