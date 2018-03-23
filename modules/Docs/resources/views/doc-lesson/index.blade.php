@extends('layouts.app')
@section('content')
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
    <form class="form-group row" id="formFilter" action="{{route('doc-lesson.index')}}" method="POST">
        <div class="col-lg-2 form-group">
            <label for="per_page">{{trans('label.per_page')}}</label>
            <select name="per_page" class="form-control inputFilter">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="col-lg-5 form-group">
            <label for="name">{{trans('label.name')}}</label>
            <input name="name" class="form-control inputFilter" placeholder="Search ...">
        </div>
        <div class="form-group col-lg-2">
            <label for="category_id">{{trans('label.category')}}</label>
            <select  class="form-control" name="category_id" id="category_id">
                <option value=""></option>
                @foreach($categoryCompose as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-2">
            <label for="sub_category_id">{{trans('label.sub_category_id')}}</label>
            <select class="form-control selectFilter" name="sub_category_id" id="sub_category_id">
                <option value=""></option>
            </select>
        </div>
        <div class="col-sm-1 form-group">
            <label for="action">{{trans('label.action')}}</label>
            <a class="btn btn-primary btn-block" href="{{route('doc-lesson.create')}}"><i class="fa fa-plus"></i></a>
            <!--<a class="btn btn-danger"><i class="fa fa-trash"></i></a>-->
        </div>
    </form>
    <div id="table">
        @include('doc::doc-lesson.table')
    </div>
    <input type="hidden" id="listSubCategoryRoute" value="{{route('sub-category.list')}}">
@endsection

@push('js')
<script src="{{asset('build/forceSelect.js?v=0')}}"></script>
<script>
    var categorySelect = $('#category_id');
    var route = $('#listSubCategoryRoute').val();
    var config = {
        route: route,
        isSelect: '#sub_category_id',
        name: 'category_id'
    };
    categorySelect.magicSelect(config);
</script>
<script src="{{asset('build/form-filter.js')}}"></script>
@endpush