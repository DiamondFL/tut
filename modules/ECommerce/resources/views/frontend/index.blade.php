@extends('frontend.outline')
@section('content')
     <div class="center_content">
            <div class="thanh_tieu_de">SẢN PHẨM MỚI</div>

             <!----------Sản phẩm--------->
          @foreach($products as $row)
            <div class="sp">
                 <div class="top_sp"></div>
                 <div class="center_sp">
                      <div class="Sanpham_tieude"><a href="#">{{$row->name}}</a></div>
                      <div class="Sanpham_image"><a href="{{route('product.details', $row->id)}}"><img width="173px" src="{{asset('')}}{{$row->picture}}" alt="điện thoại"/></a></div>
                      <div class="Sanpham_gia">
                           <span class="giam">15.990.000đ</span>
                           <span class="gia">{{$row->price}}</span>
                      </div>
                 </div>
                 <div class="bottom_sp"></div>

                 <div class="ttin_chitiet_sp">
                      <a href="{{route('product.details', $row->id)}}" class="ttin_chitiet">Chi tiết</a>
                 </div>
            </div>
          @endforeach

     </div>
@endsection
