@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Rg_reply</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('rg-reply.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="rg_question_id">{{trans('label.rg_question_id')}}</label>
    <input type="number" class="form-control" name="rg_question_id"  id="rg_question_id">
</div>
<div class="form-group col-lg-12">
    <label for="content">{{trans('label.content')}}</label>
    <textarea type="text" class="form-control ckeditor" name="content"  id="content"></textarea>
</div>
<div class="form-group col-lg-6">
    <label for="integer">{{trans('label.integer')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="integer"  id="integer" >
        </label>
    </div>
</div>


    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection