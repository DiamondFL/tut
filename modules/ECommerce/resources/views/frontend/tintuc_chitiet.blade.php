@extends('frontend.outline')
@section('content')
             
             <div class="center_content">
                  <div class="top_tt1">
                      <h1>TIN CÔNG NGHỆ</h1>
                  </div>
                  <div class="clear"></div>
                  <div class="ten-tt1">
                      <h1>{{$news->name}}</h1>
                  </div>
                  <div class="clear"></div>
                  {{$news->	details}}
             </div>
                   
               <!-------------- right content----------------->
             
@endsection

