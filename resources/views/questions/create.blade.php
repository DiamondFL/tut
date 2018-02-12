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

<form class="row" action="{{route('questions.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-12">
    <label for="question">{{trans('label.question')}}</label>
    <textarea type="text" class="form-control ckeditor" name="question"  id="question"></textarea>
</div>
<div class="form-group col-lg-6">
    <label for="score">{{trans('label.score')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="score"  id="score" >
        </label>
    </div>
</div>

<div class="form-group col-lg-6">
    <label for="type">{{trans('label.type')}}</label>
    <input type="text" class="form-control" name="type"  id="type">
</div>


    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection