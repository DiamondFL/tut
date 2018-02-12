@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="index.html"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="tables-main.html">Tables</a>
        </li>
        <li class="active">
            <strong>Basic Tables</strong>
        </li>
    </ol>
    <div>
        {{$news->title}}
        {!! $news->intro !!}
        {!! $news->content !!}
        {{$news->views}}
        {{$news->source}}
        {{$news->last_view}}
        {{$news->creator}}
        {{$news->updater}}
    </div>
    <a href="{{url()->previous()}}" class="btn btn-default"><i class="fa fa-backward"></i></a>
@endsection