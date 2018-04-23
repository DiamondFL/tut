@extends('eco::layout.main')
@section('title')
Sản phẩm
@endsection
@section('content')
    @if(session()->has('global'))
        <p>{{session()->get('global')}}</p>
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
                <a href='{{route('cart.add', $product->id)}}' class="btn btn-primary" role="button">Thêm sản phẩm vào giỏ hàng</a>
                <h3><strong>Giới thiệu sản phẩm</strong></h3>
                {!! $product->intro !!}
              </div>
         </div>
         <hr>
         @if(auth()->check())
             @include('eco::comment.setComment')
         @endif
    @else
        Hiện tại dữ liệu trống.
    @endif
   @include('eco::product.listProducts')
@endsection