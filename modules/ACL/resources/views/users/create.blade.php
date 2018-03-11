@extends('dashboard')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="tables-main.html">Tables</a>
    </li>
    <li class="active">
        <strong>Basic Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="first_name">{{trans('label.first_name')}}</label>
    <input type="text" class="form-control" name="first_name"  id="first_name">
</div>

<div class="form-group col-lg-6">
    <label for="last_name">{{trans('label.last_name')}}</label>
    <input type="text" class="form-control" name="last_name"  id="last_name">
</div>

<div class="form-group col-lg-6">
    <label for="email">{{trans('label.email')}}</label>
    <input type="text" class="form-control" name="email"  id="email">
</div>

<div class="form-group col-lg-6">
    <label for="phone_number">{{trans('label.phone_number')}}</label>
    <input type="text" class="form-control" name="phone_number"  id="phone_number">
</div>

<div class="form-group col-lg-6">
    <label for="sex">{{trans('label.sex')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="sex"  id="sex" >
        </label>
    </div>
</div>

<div class="form-group col-lg-12">
    <label for="address">{{trans('label.address')}}</label>
    <textarea type="text" class="form-control ckeditor" name="address"  id="address"></textarea>
</div>
<div class="form-group col-lg-12">
    <label for="avatar">{{trans('label.avatar')}}</label>
    <textarea type="text" class="form-control ckeditor" name="avatar"  id="avatar"></textarea>
</div>
<div class="form-group col-lg-6">
    <label for="active">{{trans('label.active')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="active"  id="active" >
        </label>
    </div>
</div>

<div class="form-group col-lg-6">
    <label for="slack_webhook_url">{{trans('label.slack_webhook_url')}}</label>
    <input type="text" class="form-control" name="slack_webhook_url"  id="slack_webhook_url">
</div>


    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection