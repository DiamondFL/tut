@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Rg_test</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('rg-test.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="title">{{trans('label.title')}}</label>
    <input type="text" class="form-control" name="title"  id="title">
</div>

<div class="form-group col-lg-12">
    <label for="content">{{trans('label.content')}}</label>
    <textarea type="text" class="form-control ckeditor" name="content"  id="content"></textarea>
</div>
<div class="form-group col-lg-6">
    <label for="rg_question_ids">{{trans('label.rg_question_ids')}}</label>
    <input type="text" class="form-control" name="rg_question_ids"  id="rg_question_ids">
</div>


    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection