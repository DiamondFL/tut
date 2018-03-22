@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('doc-lesson.index')}}">Lesson</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div>
{!! $docLesson->title !!}
{!! $docLesson->intro !!}
{!! $docLesson->content !!}
</div>
@endsection