@extends('edu::layouts.app')
@section('title', 'Tài nguyên của dự án')
@section('container')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb bc-3">
                <li>
                    <a href="/"><i class="fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="{{route('edu.tutorial.index')}}">Tutorial</a>
                </li>
                <li class="active">
                    {{$section->category->name}}
                </li>
                <li class="active">
                    {{$section->name}}
                </li>
                <li class="active">
                    <strong>Lesson</strong>
                </li>
            </ol>
            <h3 class="text-info">{{$lesson->title}}</h3>
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
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-core.css">
@endpush
@push('js')
    <script src="{{asset('')}}assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="{{asset('')}}assets/js/neon-api.js"></script>
    <script src="{{asset('')}}assets/js/neon-demo.js"></script>
    <script src="{{asset('')}}assets/js/neon-chat.js"></script>
@endpush