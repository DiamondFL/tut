@extends('layout.main')
@section('title')
Tin tức
@stop
@section('content')
    @if($news->count())
         <div class="row">
            <div class="col-lg-12">
            @foreach($news as $value)
                <div class="col-md-12 newsShow">
                  <h4 class="newsTitle"><a class="" href="{{asset('')}}news/news-details/{{$value->id}}" role="button">{{$value->title}} &raquo;</a></h4>
                  <p>{{$value->intro}}</p>
                </div>
            @endforeach
            </div>
        </div>
    @else
        Tin tức trống
    @endif
@stop