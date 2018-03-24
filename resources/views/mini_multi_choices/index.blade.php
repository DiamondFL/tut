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
    <form class="form-group row" id="formFilter" action="{{route('multi-choices.index')}}" method="POST">
        <div class="col-sm-2 form-group">
            <select name="per_page" class="form-control inputFilter">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="question" class="form-control inputFilter" placeholder="question">
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="answer" class="form-control inputFilter" placeholder="answer">
        </div>
        <div class="col-sm-2 form-group">
            <select name="is_active" class="form-control inputFilter">
                <option value="">All</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <a class="btn btn-primary" href="{{route('multi-choices.create')}}"><i class="fa fa-plus"></i></a>
            <a class="btn btn-danger destroyBtn"><i class="fa fa-trash"></i></a>
            <input route="{{route('involve.multi-choice.import')}}" type="file" id="importFile" name="file"
                   class="form-control file2 inline btn btn-success"
                   data-label="<i class='fa fa-upload'></i> Upload"/>
        </div>
    </form>
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3>
                        <i class="icon-table"></i>
                        Basic table
                    </h3>
                </div>
                <div class="box-content nopadding" id="table">
                    @include('mini_multi_choices.table')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')

@endpush
@push('js')

@endpush