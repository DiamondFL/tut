@extends('layouts.app')
@section('content')
<div class="row">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('section.index')}}">_name_</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <form action="{{route('section.update', $section->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group col-lg-6">
    <label for="name">{{trans('label.name')}}</label>
    <input type="text" class="form-control" name="name"  id="name" value="{{$section->name}}" >
</div>
<div class="form-group col-lg-6">
    <label for="img">{{trans('label.img')}}</label>
    <input type="text" class="form-control" name="img"  id="img" value="{{$section->img}}" >
</div>
<div class="form-group col-lg-6">
    <label for="is_active">{{trans('label.is_active')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="is_active"  id="is_active" value="{{$section->is_active}}">
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