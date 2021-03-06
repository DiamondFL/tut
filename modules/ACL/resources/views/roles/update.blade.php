@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{route('roles.index')}}"> Role </a>
        </li>
        <li class="active">
            <strong> Table </strong>
        </li>
    </ol>
    <form action="{{route('roles.update', $role->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field("PUT")}}
        <div class="form-group col-lg-6">
            <label for="name">{{trans('label.name')}}</label>
            <input type="text" value="{{$role->name}}" class="form-control" name="name" id="name">
        </div>

        <div class="form-group col-lg-6">
            <label for="display_name">{{trans('label.display_name')}}</label>
            <input type="text" value="{{$role->display_name}}" class="form-control" name="display_name"
                   id="display_name">
        </div>
        <div class="form-group col-lg-12">
            <label for="description">{{trans('label.description')}}</label>
            <textarea type="text" class="form-control ckeditor" name="description"
                      id="description">{{$role->description}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="is_active">{{trans('label.is_active')}}</label>
            <div>
                <div class="make-switch switch-small" data-on-label="<i class='entypo-check'></i>"
                     data-off-label="<i class='entypo-cancel'></i>">
                    <input type="checkbox" @if($role->is_active) checked @endif name="is_active" value="1" checked/>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection