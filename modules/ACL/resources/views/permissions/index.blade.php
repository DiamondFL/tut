@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{route('permissions.index')}}"> Permission </a>
        </li>
        <li class="active">
            <strong> Table </strong>
        </li>
    </ol>
    <form class="form-group row" id="formFilter" action="{{route('permissions.index')}}" method="GET">
        <div class="col-sm-3 form-group">
            <select name="role_id" class="form-control selectFilter">
                <option value="">Select role</option>
                @foreach($roleCompose as $role_id => $role_name)
                    <option @if(request()->get('role_id') == $role_id) selected
                            @endif value="{{$role_id}}">{{$role_name}}</option>
                @endforeach
            </select>
        </div>
        {{--<div class="col-sm-3 form-group">--}}
            {{--<button class="btn btn-primary">Done</button>--}}
        {{--</div>--}}
    </form>
    <div class="box-content nopadding">
        <div id="table">
            @include('permissions.table')
        </div>
    </div>
    @include('layouts.modals.roleCompose')
@endsection
@push('js')
    <script src="{{asset('build/form-filter.js')}}"></script>
    <script src="{{asset('build/authorization.js')}}"></script>
@endpush