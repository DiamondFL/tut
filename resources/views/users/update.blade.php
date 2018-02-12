@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title">{{trans('title.users')}}</div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('users.update', $users->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="first_name">{{trans('label.first_name')}}</label>
    <input type="text" class="form-control" name="first_name"  id="first_name" value="{{$users->first_name}}" >
</div>
<div class="form-group col-lg-6">
    <label for="last_name">{{trans('label.last_name')}}</label>
    <input type="text" class="form-control" name="last_name"  id="last_name" value="{{$users->last_name}}" >
</div>
<div class="form-group col-lg-6">
    <label for="email">{{trans('label.email')}}</label>
    <input type="text" class="form-control" name="email"  id="email" value="{{$users->email}}" >
</div>
<div class="form-group col-lg-6">
    <label for="phone_number">{{trans('label.phone_number')}}</label>
    <input type="text" class="form-control" name="phone_number"  id="phone_number" value="{{$users->phone_number}}" >
</div>
<div class="form-group col-lg-6">
    <label for="sex">{{trans('label.sex')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="sex"  id="sex" value="{{$users->sex}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="birthday">{{trans('label.birthday')}}</label>
    <input type="datetime" class="form-control" name="birthday"  id="birthday" value="{{$users->birthday}}">
</div>
<div class="form-group col-lg-12">
    <label for="address">{{trans('label.address')}}</label>
    <textarea type="text" class="form-control ckeditor" name="address"  id="address">{{$users->address}}</textarea>
</div>
<div class="form-group col-lg-12">
    <label for="avatar">{{trans('label.avatar')}}</label>
    <textarea type="text" class="form-control ckeditor" name="avatar"  id="avatar">{{$users->avatar}}</textarea>
</div>
<div class="form-group col-lg-6">
    <label for="active">{{trans('label.active')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="active"  id="active" value="{{$users->active}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="last_login">{{trans('label.last_login')}}</label>
    <input type="datetime" class="form-control" name="last_login"  id="last_login" value="{{$users->last_login}}">
</div>
<div class="form-group col-lg-6">
    <label for="last_logout">{{trans('label.last_logout')}}</label>
    <input type="datetime" class="form-control" name="last_logout"  id="last_logout" value="{{$users->last_logout}}">
</div>
<div class="form-group col-lg-6">
    <label for="slack_webhook_url">{{trans('label.slack_webhook_url')}}</label>
    <input type="text" class="form-control" name="slack_webhook_url"  id="slack_webhook_url" value="{{$users->slack_webhook_url}}" >
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection