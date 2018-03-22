@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{route('doc-example.index')}}">Example</a>
        </li>
        <li class="active">
            <strong>Show</strong>
        </li>
    </ol>
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
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <a href="{{url()->previous()}}" >
                <i class="fa fa-arrow-left"></i>
                {{trans('button.back')}}
            </a>
        </div>
    </div>
@endsection