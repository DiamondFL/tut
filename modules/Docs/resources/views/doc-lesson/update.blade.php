@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i></a>
            </li>
            <li>
                <a href="{{route('doc-lesson.index')}}">Lesson</a>
            </li>
            <li class="active">
                <strong>Table</strong>
            </li>
        </ol>
        <form action="{{route('doc-lesson.update', $docLesson->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
                <label for="title">{{trans('label.title')}}</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$docLesson->title}}">
            </div>
            <div class="form-group col-lg-3">
                <label for="category">{{trans('label.category')}}</label>
                <select class="form-control" name="category" id="category">
                    <option value=""></option>
                    @foreach($categoryCompose as $id => $name)
                        <option @if($category_id === $id) selected @endif value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label for="sub_category_id">{{trans('label.sub_category_id')}}</label>
                <select class="form-control" name="sub_category_id" id="sub_category_id">
                    <option value=""></option>
                    @foreach($subCategoryList as $id => $name)
                        <option @if($docLesson->sub_category_id === $id) selected
                                @endif value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" id="listSubCategoryRoute" value="{{route('sub-category.list')}}">
            <div class="form-group col-lg-12">
                <label for="intro">{{trans('label.intro')}}</label>
                <textarea class="form-control ckeditor" name="intro" id="intro">{{$docLesson->intro}}</textarea>
            </div>
            <div class="form-group col-lg-12">
                <label for="content">{{trans('label.content')}}</label>
                <textarea class="form-control ckeditor" name="content" id="content">{{$docLesson->content}}</textarea>
            </div>
            <div class="col-lg-12 form-group">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
@endsection