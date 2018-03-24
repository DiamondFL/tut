@extends('layouts.app')
@section('title')
    Marked
@endsection
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a>Tables</a>
        </li>
        <li class="active">
            <strong>Basic Tables</strong>
        </li>
    </ol>
    <form class="form-group row" id="formFilter" action="{{route('multi_choices.index')}}" method="POST">
        {{--<div class="col-sm-2 form-group">--}}
            {{--<select name="per_page" class="form-control inputFilter">--}}
                {{--<option value="">10</option>--}}
                {{--<option value="">20</option>--}}
                {{--<option value="">30</option>--}}
                {{--<option value="">40</option>--}}
                {{--<option value="">50</option>--}}
            {{--</select>--}}
        {{--</div>--}}
        <div class="col-sm-5 form-group">
            <label for="question">{{trans('label.question')}}</label>
            <input type="text" name="question" class="form-control inputFilter" placeholder="question">
        </div>
        <div class="form-group col-lg-1">
            <label for="level">{{trans('label.level')}}</label>
            <select class="form-control selectFilter" name="level" id="level">
                <option value="">All</option>
                @foreach(LEVEL as $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-2">
            <label for="knowledge">{{trans('label.knowledge')}}</label>
            <select class="form-control selectFilter" name="knowledge" id="knowledge">
                <option value="">All</option>
                @foreach(KNOWLEDGE as $id => $value)
                    <option value="{{$id}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-2">
            <label for="professional">{{trans('label.professional')}}</label>
            <select class="form-control selectFilter" name="professional" id="professional">
                <option value="">All</option>
                @foreach(PROFESSIONAL as $id => $value)
                    <option value="{{$id}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <label>{{trans('label.action')}}</label>
            <div>
                <a class="btn btn-primary btn-group" href="{{route('multi_choices.create')}}">
                    <i class="fa fa-plus"></i>
                </a>
                <a class="btn btn-danger destroyBtn btn-group"><i class="fa fa-trash"></i></a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-upload"></i> Upload
                </button>
            </div>
        </div>
    </form>
    <div class="box-content nopadding" id="table">
        @include('multi_choices.table')
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload excel</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('involve.multi-choice.import')}}" method="POST">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <select name="subject_id" id="subject_id"  class="form-control">
                                @foreach($subjectList as $k => $v)
                                    <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input route="{{route('involve.multi-choice.import')}}"
                                   type="file" id="importFile" name="file"
                                   class="form-control file2 inline btn btn-success"
                                   data-label="<i class='fa fa-upload'></i> Upload"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script src="{{asset('build/form-filter.js')}}"></script>
@endpush