@extends('layouts.app')
@section('content')
<div class="row">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('ush-lession.index')}}">_name_</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <form action="{{route('ush-lession.update', $ushLession->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        
        <div class="col-lg-12 form-group">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
</div>
@endsection