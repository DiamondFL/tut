@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i></a>
            </li>
            <li>
                <a href="{{route('tutorial.index')}}">{{trans('tut:table.section')}}</a>
            </li>
            <li class="active">
                <strong>Table</strong>
            </li>
        </ol>
        <form action="{{route('tutorial.update', $tutorial->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-12">
                <label for="name">{{trans('label.name')}}</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$tutorial->name}}">
            </div>
            <div class="form-group col-lg-12">
                <label for="img">{{trans('label.img')}}</label>
                <input type="file" name="img" id="img">
            </div>
            <div class="form-group col-lg-12">
                <label for="description">{{trans('tut::label.description')}}</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$tutorial->description}}</textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="is_active">{{trans('label.is_active')}}</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_active" id="is_active" value="{{$tutorial->is_active}}">
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