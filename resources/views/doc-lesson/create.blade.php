@extends('layouts.app')
@section('content')
<div class="row">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="/">_name_</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>

    <form action="{{route('doc-lesson.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-6">
    <label for="title">{{trans('label.title')}}</label>
    <input type="text" class="form-control" name="title"  id="title">
</div>

<div class="form-group col-lg-12">
    <label for="intro">{{trans('label.intro')}}</label>
    <textarea class="form-control ckeditor" name="intro"  id="intro"></textarea>
</div>
<div class="form-group col-lg-12">
    <label for="content">{{trans('label.content')}}</label>
    <textarea class="form-control ckeditor" name="content"  id="content"></textarea>
</div>
<div class="form-group col-lg-6">
    <label for="sub_category_id">{{trans('label.sub_category_id')}}</label>
    <input type="number" class="form-control" name="sub_category_id"  id="sub_category_id">
</div>
<div class="form-group col-lg-6">
    <label for="views">{{trans('label.views')}}</label>
    <input type="number" class="form-control" name="views"  id="views">
</div>
<div class="form-group col-lg-6">
    <label for="last_view">{{trans('label.last_view')}}</label>
    <input type="datetime" class="form-control" name="last_view"  id="last_view">
</div>
<div class="form-group col-lg-6">
    <label for="created_by">{{trans('label.created_by')}}</label>
    <input type="number" class="form-control" name="created_by"  id="created_by">
</div>
<div class="form-group col-lg-6">
    <label for="updated_by">{{trans('label.updated_by')}}</label>
    <input type="number" class="form-control" name="updated_by"  id="updated_by">
</div>

        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
</div>
@endsection