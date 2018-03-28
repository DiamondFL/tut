@extends('edu::layouts.app')

@section('container')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/dashboard"><i class="fa fa-home"></i>Dashboard</a>
        </li>
        <li class="active">
            <strong>Profile</strong>
        </li>
    </ol>
    <div class="row">
        <div class="col-xs-3 col-md-2 form-group">
            @if(trim(auth()->user()->avatar) !== '')
             <img class="img-responsive img-circle img-thumbnail" src="{{ auth()->user()->avatar }}">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-bordered">
                <tr>
                    <td>
                        Information
                    </td>
                    <td>
                        <strong>{{auth()->user()->user}}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.first_name')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->first_name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.last_name')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->last_name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.email')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->email}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.phone_number')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->phone_number}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.coin')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->coin}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.address')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->address}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{trans('label.sex')}}</strong>
                    </td>
                    <td>
                        {{auth()->user()->sex == 1 ? 'Male' : 'Female'}}
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
            <button class="btn bnt-default" data-toggle="modal" data-target="#transaction">
                <i class="fa fa-transgender"></i> Transaction Coin
            </button>
        </div>
    </div>
    @include('acl::users.modal.update-profile')
    @include('acl::users.modal.update-pass')
    @include('acl::users.modal.transaction')
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