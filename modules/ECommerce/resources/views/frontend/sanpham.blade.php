@extends('frontend.outline')
        <!-------------- center content----------------->
@section('content')
             <!-------------- center content----------------->
             
     <div class="center_content">
          <div class="ap">
              <div class="ap_main">
                  <div class="ap_tieu_de">
                       <span class="hot"></span>
                       <h1>{{$style_name}}</h1>
                  </div>

                   <!----------sp--------->
                  @foreach($products as $row)
                  <div class="clear"></div>
                  <div class="danh_sach_sp">
                      <div class="sp1">
                          <div class="thong_tin">
                              <div class="image_sp">
                                  <a href="chitiet3.html"><img src="{{asset('')}}{{$row->picture}}" alt="apple" /></a>
                              </div>
                              <div class="nd_sp">
                                   <div class="ten_sp">
                                        <a href="chitiet3.html">{{$row->name}}</a>
                                   </div>
                                   <div class="tom_tat">
                                   {{$row->intro}}
                                   </div>
                                   <div class="gia">
                                       <span class="gia">{{number_format($row->price)}} đ</span>
                                   </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  @endforeach
                  <!------------------->

              </div>
          </div>
     </div>
                    
@endsection