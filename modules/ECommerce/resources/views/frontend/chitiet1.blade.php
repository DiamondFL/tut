@extends('frontend.outline')
@section('content')

        <!-------------- center content----------------->
             
     <div class="center_content">
          <div class="top_tt1">
              <h1>Sản phẩm mới</h1>
          </div>
          <div class="clear"></div>

        <div class="danh_sach_sp">
          <div class="sp1">
              <div class="thong_tin">
                  <div class="image_ct">
                      <a href="#"><img width="290px" src="{{asset('')}}{{$product->picture}}" alt="apple" /></a>
                  </div>
                  <div class="nd_ct">
                       <div class="ten_ct" style="font-size:13px;">
                            <a href="#" style="text-decoration:none;">{{$product->name}}</a>
                       </div> <br />
                       <div class="tom_tat">
                           {{$product->details}}
                       </div>
                       <div class="gia">
                           <span class="gia">{{number_format($product->price)}} đ</span>
                       </div>
                  </div>
              </div>

          </div>
        </div>

     </div>
               <!-------------- right content----------------->
             
@endsection

