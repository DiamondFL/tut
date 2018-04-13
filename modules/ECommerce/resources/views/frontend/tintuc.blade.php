@extends('frontend.outline')
@section('content')
     <div class="center_content">
          <div class="ap">
              <div class="ap_main">
                  <div class="ap_tieu_de">
                       <span class="hot"></span>
                       <h1>TIN TỨC</h1>
                  </div>

                   <!----------sp--------->
                  @@foreach($news as $row)
                  <div class="clear"></div>
                  <div class="danh_sach_sp">
                      <div class="sp1">
                          <div class="thong_tin">
                              <h3><strong><a href="{{route('news.details', $row->id)}}">{{$row->title}}</a></strong></h3>
                              {{$row->intro}}
                          </div>

                      </div>
                  </div>
                    @endforeach
                  <!------------------->
              </div>
          </div>
     </div>
@endsection