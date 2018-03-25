@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('lesson.index')}}">lessons</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div>
    
</div>
<a href="{{url()->previous()}}" class="btn btn-default"><i class="fa fa-backward"></i></a>
@endsection