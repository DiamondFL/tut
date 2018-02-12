@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a >Table</a>
        </li>
        <li class="active">
            <strong>Basic Tables</strong>
        </li>
    </ol>
    <div>
        {!! _show_ !!}
    </div>
    <a href="{{url()->previous()}}" class="btn btn-default"><i class="fa fa-backward"></i></a>
@endsection