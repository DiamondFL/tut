@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/dashboard"><i class="fa fa-home"></i>Dashboard</a>
        </li>
        <li class="active">
            <strong>Profile</strong>
        </li>
    </ol>
    {{--@include('partials.errors')--}}
    {{--@include('partials.message')--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-3 col-md-2 form-group">--}}
            {{--<img class="img-responsive img-circle img-thumbnail"--}}
                 {{--src="{{ trim($user->avatar) !== '' ? $user->avatar : asset('assets/images/thumb-1@2x.png') }}">--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                {{--<tr>--}}
                {{--<td>--}}
                {{--User name--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--<strong>{{$user->user}}</strong>--}}
                {{--</td>--}}
                {{--</tr>--}}
                <tr>
                    <td>
                        <strong>{{trans('label.name')}}</strong>
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.first_name')}}</strong>
                    </td>
                    <td>
                        {{$user->first_name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.last_name')}}</strong>
                    </td>
                    <td>
                        {{$user->last_name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.email')}}</strong>
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.sex')}}</strong>
                    </td>
                    <td>
                        {{$user->sex == 1 ? 'Male' : 'Female'}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn bnt-default" data-toggle="modal" data-target="#profile">
                <i class="fa fa-edit"></i> Edit
            </button>
            <button class="btn bnt-default" data-toggle="modal" data-target="#change_password">
                <i class="fa fa-refresh"></i> Change password
            </button>
        </div>
    </div>
    @include('acl::users.modal.update-profile')
    @include('acl::users.modal.update-pass')
@endsection
@push('css')
    <link rel="stylesheet"
          href="<?php echo e(asset('')); ?>bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
@endpush
@push('js')
    <script type="text/javascript" src="<?php echo e(asset('')); ?>bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript"
            src="<?php echo e(asset('')); ?>bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{asset('js/test-case-index.js')}}"></script>
    <script type="text/javascript">
        $("#birthday").datetimepicker({format: 'YYYY-MM-DD'});
    </script>
@endpush