@extends('layouts.app')
@section('content')
<div class="row">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('doc-lesson.index')}}">doc_lessons</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>

    <form class="form-group" id="formFilter" action="{{route('doc-lesson.index')}}" method="POST">
        <!--<div class="col-sm-2 form-group">-->
            <!--<select name="per_page" class="form-control inputFilter">-->
                <!--<option value="10">10</option>-->
                <!--<option value="20">20</option>-->
                <!--<option value="30">30</option>-->
                <!--<option value="40">40</option>-->
                <!--<option value="50">50</option>-->
            <!--</select>-->
        <!--</div>-->
        <div class="col-sm-8 form-group">
            <input name="name" class="form-control inputFilter" placeholder="name">
        </div>
        <!--<div class="col-sm-3 form-group">-->
        <!--<input name="display_name" class="form-control inputFilter" placeholder="display_name">-->
        <!--</div>-->
        <!--<div class="col-sm-2 form-group">-->
            <!--<select name="is_active" class="form-control inputFilter">-->
                <!--<option value="">All</option>-->
                <!--<option value="1">Active</option>-->
                <!--<option value="0">Inactive</option>-->
            <!--</select>-->
        <!--</div>-->
        <div class="col-sm-2 form-group">
            <a class="btn btn-primary" href="{{route('doc-lesson.create')}}"><i class="fa fa-plus"></i></a>
            <!--<a class="btn btn-danger"><i class="fa fa-trash"></i></a>-->
        </div>
    </form>
    <div class="box-content nopadding" id="table">
        @include('doc::doc-lesson.table')
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('build/form-filter.js')}}"></script>
@endpush