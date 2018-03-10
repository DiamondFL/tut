@extends('layouts.app')
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
    <form class="form-group row" id="formFilter" action="{{route('permissions.index')}}" method="POST">
        <div class="col-sm-2 form-group">
            <select name="per_page" class="form-control inputFilter">
                <option value="">10</option>
                <option value="">20</option>
                <option value="">30</option>
                <option value="">40</option>
                <option value="">50</option>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="name" class="form-control inputFilter" placeholder="name">
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="display_name" class="form-control inputFilter" placeholder="display_name">
        </div>
        <div class="col-sm-2 form-group">
            <select name="is_active" class="form-control inputFilter">
                <option value="">All</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <a class="btn btn-primary" href="{{route('permissions.create')}}"><i class="fa fa-plus"></i></a>
            <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </div>
    </form>

    <div class="box-content nopadding">
        @include('permissions.table')
    </div>
    @include('layouts.modals.roleCompose')
@endsection

@push('js')
<script src="{{asset('build/form-filter.js')}}"></script>
<script src="{{asset('build/authorization.js')}}"></script>
@endpush