@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Doc_package</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('doc-package.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="name">{{trans('label.name')}}</label>
    <input type="text" class="form-control" name="name"  id="name">
</div>

<div class="form-group col-lg-6">
    <label for="link">{{trans('label.link')}}</label>
    <input type="text" class="form-control" name="link"  id="link">
</div>

<div class="form-group col-lg-12">
    <label for="intro">{{trans('label.intro')}}</label>
    <textarea type="text" class="form-control ckeditor" name="intro"  id="intro"></textarea>
</div>

    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection