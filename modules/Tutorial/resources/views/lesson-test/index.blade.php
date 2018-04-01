@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('lesson-test.index')}}">{{trans('tut:table.lesson_tests')}}</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <form class="form-group row" id="formFilter" action="{{route('lesson-test.index')}}" method="POST">
        <div class="col-sm-1 form-group">
            <label for="">{{trans('label.per_page')}}</label>
            <select name="per_page" class="form-control inputFilter">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="">{{trans('label.search')}}</label>
            <input name="question" class="form-control inputFilter" placeholder="question...">
        </div>

        <div class="form-group col-lg-2">
            <label for="tutorial_id">{{trans('label.tutorial')}}</label>
            <select  class="form-control" name="tutorial_id" id="tutorial_id">
                <option value=""></option>
                @foreach($tutorialCompose as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-2">
            <label for="lesson_id">{{trans('label.section')}}</label>
            <select class="form-control" name="section_id" id="section_id">

            </select>
        </div>
        <div class="form-group col-lg-2">
            <label for="lesson_id">{{trans('label.lesson')}}</label>
            <select required class="form-control" name="lesson_id" id="lesson_id">

            </select>
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
            <label for="">{{trans('label.action')}}</label>
            <a class="btn btn-primary btn-block" href="{{route('lesson-test.create')}}"><i class="fa fa-plus"></i></a>
            <!--<a class="btn btn-danger"><i class="fa fa-trash"></i></a>-->
        </div>
    </form>
    <div class="box-content nopadding" id="table">
        @include('tut::lesson-test.table')
    </div>
@endsection

@push('js')
<script src="{{asset('build/form-filter.js')}}"></script>
@endpush