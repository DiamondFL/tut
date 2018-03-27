@extends('layouts.app')
@section('content')
<div class="row">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('lesson.index')}}">_name_</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <form action="{{route('lesson.update', $lesson->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group col-lg-6">
    <label for="title">{{trans('label.title')}}</label>
    <input type="text" class="form-control" name="title"  id="title" value="{{$lesson->title}}" >
</div>
<div class="form-group col-lg-12">
    <label for="intro">{{trans('label.intro')}}</label>
    <textarea class="form-control ckeditor" name="intro"  id="intro">{{$lesson->intro}}</textarea>
</div>
<div class="form-group col-lg-12">
    <label for="content">{{trans('label.content')}}</label>
    <textarea class="form-control ckeditor" name="content"  id="content">{{$lesson->content}}</textarea>
</div>
<div class="form-group col-lg-6">
    <label for="section_id">{{trans('label.section_id')}}</label>
    <input type="number" class="form-control" name="section_id"  id="section_id" value="{{$lesson->section_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="views">{{trans('label.views')}}</label>
    <input type="number" class="form-control" name="views"  id="views" value="{{$lesson->views}}">
</div>
<div class="form-group col-lg-6">
    <label for="last_view">{{trans('label.last_view')}}</label>
    <input type="datetime" class="form-control" name="last_view"  id="last_view" value="{{$lesson->last_view}}">
</div>
<div class="form-group col-lg-6">
    <label for="created_by">{{trans('label.created_by')}}</label>
    <input type="number" class="form-control" name="created_by"  id="created_by" value="{{$lesson->created_by}}">
</div>
<div class="form-group col-lg-6">
    <label for="updated_by">{{trans('label.updated_by')}}</label>
    <input type="number" class="form-control" name="updated_by"  id="updated_by" value="{{$lesson->updated_by}}">
</div>
<div class="form-group col-lg-6">
    <label for="is_active">{{trans('label.is_active')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="is_active"  id="is_active" value="{{$lesson->is_active}}">
        </label>
    </div>
</div>

        <div class="col-lg-12 form-group">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
</div>
@endsection