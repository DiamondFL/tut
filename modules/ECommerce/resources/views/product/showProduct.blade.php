@extends('eco::layout.main')
@section('title')
Sản phẩm
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @include('eco::product.listProducts')
@endsection