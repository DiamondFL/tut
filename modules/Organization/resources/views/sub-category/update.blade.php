@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('-sub-category.index')}}">_name_</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <div class="card">
        <div class="card-body">
            <form action="{{route('-sub-category.update', $SubCategory->id)}}" method="POST"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group col-lg-6">
                    <label for="name">{{trans('label.name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$SubCategory->name}}">
                </div>
                <div class="form-group col-lg-6">
                    <label for="category_id">{{trans('label.category_id')}}</label>
                    <input type="number" class="form-control" name="category_id" id="category_id"
                           value="{{$SubCategory->category_id}}">
                </div>

                <div class="col-lg-12">
                    <button class="btn btn-primary">{{trans('button.done')}}</button>
                    <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection