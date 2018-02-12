@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title">{{trans('title.subjects')}}</div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('subjects.update', $subjects->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="name">{{trans('label.name')}}</label>
    <input type="text" class="form-control" name="name"  id="name" value="{{$subjects->name}}" >
</div>
<div class="form-group col-lg-12">
    <label for="description">{{trans('label.description')}}</label>
    <textarea type="text" class="form-control ckeditor" name="description"  id="description">{{$subjects->description}}</textarea>
</div>
<div class="form-group col-lg-6">
    <label for="is_active">{{trans('label.is_active')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="is_active"  id="is_active" value="{{$subjects->is_active}}">
        </label>
    </div>
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection