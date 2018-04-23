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
                    <strong>{{$tutorial->name}}</strong>
                </li>
            </ol>
            {{--<h1>List section</h1>--}}

            {{--<em>Entypo is a set of 250+ carefully crafted pictograms. All released for free under the Creative Commons--}}
                {{--license--}}
                {{--CC BY-SA.</em>--}}
        </div>
    </div>
    {{--<div class="row">--}}
        {{--@foreach($sections as $row)--}}
            {{--<div href="{{'edu.tutorial.lesson', $row->id}}" class="col-sm-3">--}}
                {{--<a class="tile-stats tile-primary">--}}
                    {{--<div class="icon"><i class="entypo-language"></i></div>--}}
                    {{--<div class="num"></div>--}}
                    {{--<h3>{{$row->name}}</h3>--}}
                    {{--<p>{{count($row->lessons)}} Lessons</p>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-lg-12">
            {{--<h1>Detail tutorial</h1>--}}
            <table class="table">
                <tr class="bg-primary">
                    <th>Section</th>
                    <th>Lesson</th>
                </tr>
                @foreach($sections as $row)
                    <tr class="bg-info">
                        <td class="text-info">
                            <a href="{{route('edu.tutorial.section', $row->id)}}">{{$row->name}} ({{count($row->lessons)}} lessons)</a>
                        </td>
                        <td></td>
                    </tr>
                    @foreach($row->lessons as $lesson)
                        <tr>
                            <td></td>
                            <td class="">
                                <a href="{{route('edu.tutorial.lesson', $lesson->id)}}">{{$lesson->title}}</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach

            </table>
        </div>
    </div>
@endsection

@push('head')
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-core.css">
@endpush