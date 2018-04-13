@extends('layout.main')
@section('title')
Sản phẩm
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @if($product->count())
        <div class="row">
              <div class="col-lg-6">
                <a href="#">
                  <img class="media-object" src="{{asset('')}}{{$product->picture}}" alt="...">
                </a>
              </div>
              <div class="col-lg-6">
                <h3><strong>Tên sản phẩm: </strong>{{$product->name}}</h3>
                <h3><strong>Giá: </strong>{{number_format($product->price)}} Đ</h3>
                <a href='{{asset('')}}cart/add-cart/{{$product->id}}' class="btn btn-primary" role="button">Thêm sản phẩm vào giỏ hàng</a>
                <h3><strong>Giới thiệu sản phẩm</strong></h3>
                <p>{{$product->intro}}</p>
              </div>
         </div>
         <hr>
         @if(Auth::check())
             @include('comment.setComment')
         @endif
    @else
        Hiện tại dữ liệu trống.
    @endif
   @include('product.listProducts')
@endsection