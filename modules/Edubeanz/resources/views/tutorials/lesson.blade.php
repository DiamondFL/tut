@extends('edu::layouts.app')
@section('title', 'Tài nguyên của dự án')
@section('container')
    <div class="row form-group">
        <div class="col-lg-12">
            <ol class="breadcrumb bc-3">
                <li>
                    <a href="/"><i class="fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="/">Extra</a>
                </li>
                <li>

                    <a href="/">Icons</a>
                </li>
                <li class="active">
                    <strong>Entypo</strong>
                </li>
            </ol>
            <h1>{{$lesson->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 text-justify">

            <div class="panel panel-primary" data-collapsed="0">

                <!-- panel head -->
                {{--<div class="panel-heading">--}}
                    {{--<div class="panel-title"><h3><strong></strong></h3></div>--}}

                {{--</div>--}}

                <!-- panel body -->
                <div class="panel-body">

                    {!! $lesson->intro !!}
                    {!! $lesson->content !!}
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <ul class="list-group">
                <li class="list-group-item text-info"><strong>{{$section->name}}</strong></li>
                @foreach($lessonList as $id => $name)
                <li class="list-group-item">
                    <a class="{{$lesson->id == $id ? 'text-danger' : ''}}" href="{{route('edu.tutorial.lesson', $id)}}">{{$name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Footer Widgets -->
@endsection
@push('head')
    <style>
        /*.slimScrollBar {*/
            /*background: #0c3c50;*/
        /*}*/
        /*.panel-body, body, .panel-heading {*/
            /*background:url('http://i47.tinypic.com/2hsc187.png');*/
        /*}*/
    </style>
@endpush
@push('js')
    <script src="{{asset('')}}assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="{{asset('')}}assets/js/neon-api.js"></script>
    <script src="{{asset('')}}assets/js/neon-demo.js"></script>
    <script src="{{asset('')}}assets/js/neon-chat.js"></script>
@endpush