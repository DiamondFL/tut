@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('rg-answer.index')}}">_name_</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div class="card">
    <div class="card-body">
        <form action="{{route('rg-answer.update', $rgAnswer->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="min">{{trans('label.min')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="min"  id="min" value="{{$rgAnswer->min}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="max">{{trans('label.max')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="max"  id="max" value="{{$rgAnswer->max}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-12">
    <label for="content">{{trans('label.content')}}</label>
    <textarea type="text" class="form-control ckeditor" name="content"  id="content">{{$rgAnswer->content}}</textarea>
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection