@extends('edu::layouts.app')
@section('title')
    Tài nguyên của dự án
@endsection
@section('container')
    <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="text-info">{{$docExample->title}}</h4>
                    <hr>
                    {!! $docExample->intro !!}
                    <hr>
                    {!! $docExample->content !!}
                    <hr>
                    <label>Số lượt xem : {{ $docExample->views }}</label>
                    <hr>
                    <label> Lần xem cuối: {{ $docExample->last_view }} </label>
                    <hr>
                    <div>
                        <label for="">Tags</label>
                        @foreach($tagList as $id => $name)
                            <a href="#{{$id}}" class="btn btn-xs btn-info">{{$name}}</a>
                        @endforeach
                    </div>
                    {{--        {{ $docExample->creator->email }}--}}
                    <hr>
                    <a href="{{url()->previous()}}" >
                        <i class="entypo-back"></i>
                        {{trans('button.back')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">

        </div>
    </div>
@endsection