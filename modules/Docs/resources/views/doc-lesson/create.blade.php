@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="/">Lesson</a>
            </li>
            <li class="active">
                <strong>Table</strong>
            </li>
        </ol>
        <form action="{{route('doc-lesson.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group col-lg-6">
                <label for="title">{{trans('label.title')}}</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group col-lg-3">
                <label for="category">{{trans('label.category')}}</label>
                <select  class="form-control" name="category" id="category">
                    <option value=""></option>
                    @foreach($categoryCompose as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label for="sub_category_id">{{trans('label.sub_category_id')}}</label>
                <select  class="form-control" name="sub_category_id" id="sub_category_id">
                    <option value=""></option>
                </select>
            </div>
            <input type="hidden" id="listSubCategoryRoute" value="{{route('sub-category.list')}}">
            <div class="form-group col-lg-12">
                <label for="intro">{{trans('label.intro')}}</label>
                <textarea class="form-control ckeditor" name="intro" id="intro"></textarea>
            </div>
            <div class="form-group col-lg-12">
                <label for="content">{{trans('label.content')}}</label>
                <textarea class="form-control ckeditor" name="content" id="content"></textarea>
            </div>
            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{asset('build/forceSelect.js')}}"></script>
    <script>
        var categorySelect = $('#category');
        var route = $('#listSubCategoryRoute').val();
        var config = {
            route: route,
            isSelect: '#sub_category_id',
            name: 'category_id'
        };
        categorySelect.magicSelect(config);
    </script>
@endpush