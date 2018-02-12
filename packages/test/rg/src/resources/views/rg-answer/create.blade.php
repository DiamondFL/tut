@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Rg_answer</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('rg-answer.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="min">{{trans('label.min')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="min"  id="min" >
        </label>
    </div>
</div>

<div class="form-group col-lg-6">
    <label for="max">{{trans('label.max')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="max"  id="max" >
        </label>
    </div>
</div>

<div class="form-group col-lg-12">
    <label for="content">{{trans('label.content')}}</label>
    <textarea type="text" class="form-control ckeditor" name="content"  id="content"></textarea>
</div>

    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection