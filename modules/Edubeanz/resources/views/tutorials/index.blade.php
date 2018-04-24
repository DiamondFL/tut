@extends('edu::layouts.app')
@section('title', 'Tài nguyên của dự án')
@section('container')
    <div class="row form-group">
        <div class="col-lg-12">
            {{--<ol class="breadcrumb bc-3">--}}
                {{--<li>--}}
                    {{--<a href="/"><i class="fa-home"></i>Home</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="/">Extra</a>--}}
                {{--</li>--}}
                {{--<li>--}}

                    {{--<a href="/">Icons</a>--}}
                {{--</li>--}}
                {{--<li class="active">--}}
                    {{--<strong>Entypo</strong>--}}
                {{--</li>--}}
            {{--</ol>--}}
            <h3>Tutorials</h3>
        </div>
    </div>
    <div class="row">
        @foreach($tutorials as $row)
            <div class="col-sm-6">
                <a href="{{route('edu.tutorial.show', $row->id)}}" class="tile-title tile-green">
                    {{--<div class="icon">--}}
                        {{--<i class="glyphicon glyphicon-leaf"></i>--}}
                    {{--</div>--}}
                    <div class="title">
                        <h3>{{$row->name}}</h3>
                        <p>so far in our blog, and our website.</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

@push('head')
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-core.css">
@endpush