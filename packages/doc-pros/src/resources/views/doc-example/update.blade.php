@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('doc-example.index')}}">{{trans('doc::table.doc_examples')}}</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <div class="card">
        <div class="card-body">
            <form action="{{route('doc-example.update', $docExample->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group col-lg-12">
                    <label for="">{{trans('label.title')}}</label>
                    <input type="text" name="title" value="{{$docExample->title}}" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                    <label for="intro">{{trans('label.intro')}}</label>
                    <textarea type="text" class="form-control ckeditor" name="intro"
                              id="intro">{{$docExample->intro}}</textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="content">{{trans('label.content')}}</label>
                    <textarea class="form-control ckeditor" name="content"
                              id="content">{{$docExample->content}}</textarea>
                </div>
                @include('doc::layouts.includes.tags.update')
                <div class="col-lg-12">
                    <button class="btn btn-primary">{{trans('button.done')}}</button>
                    <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tags').select2({
                tags: true
            });
        });
    </script>
@endpush