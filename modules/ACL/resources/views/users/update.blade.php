@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href=/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a>User</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group col-lg-6">
            <label for="first_name">{{trans('label.first_name')}}</label>
            <input type="text" class="form-control" name="first_name" id="first_name"
                   value="{{$user->first_name}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="last_name">{{trans('label.last_name')}}</label>
            <input type="text" class="form-control" name="last_name" id="last_name"
                   value="{{$user->last_name}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="email">{{trans('label.email')}}</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="phone_number">{{trans('label.phone_number')}}</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number"
                   value="{{$user->phone_number}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="birthday">{{trans('label.birthday')}}</label>
            <input type="datetime" class="form-control" name="birthday" id="birthday"
                   value="{{$user->birthday}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="slack_webhook_url">{{trans('label.slack_webhook_url')}}</label>
            <input type="text" class="form-control" name="slack_webhook_url" id="slack_webhook_url"
                   value="{{$user->slack_webhook_url}}">
        </div>
        <div class="form-group col-lg-12">
            <label for="address">{{trans('label.address')}}</label>
            <textarea type="text" class="form-control ckeditor" name="address"
                      id="address">{{$user->address}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="avatar">{{trans('label.avatar')}}</label>
            <input type="file" class="form-control ckeditor" name="avatar"
                      id="avatar">
        </div>
        <div class="form-group col-lg-6">
            <label for="active">{{trans('label.active')}}</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active" id="active" value="{{$user->active}}">
                </label>
            </div>
        </div>
        <div class="form-group col-lg-6">
            <label for="sex">{{trans('label.sex')}}</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="sex" id="sex" value="{{$user->sex}}">
                </label>
            </div>
        </div>
        <div class="form-group col-lg-12">
            <select name="role_ids[]" id="role_ids" class="form-control" multiple>
                @foreach($roleCompose as $id => $name)
                    <option @if(in_array($id, $roleIds)) selected @endif value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection