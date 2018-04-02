@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{route('doc-example.index')}}">Example</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>
    <form class="row" action="{{route('doc-example.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-12">
            <label for="title">{{trans('label.title')}}</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group col-lg-12">
            <label for="intro">{{trans('label.intro')}}</label>
            <textarea type="text" class="form-control ckeditor" name="intro" id="intro"></textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="content">{{trans('label.content')}}</label>
            <textarea class="form-control ckeditor" name="content" id="content"></textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="tags">{{trans('label.tag')}}</label>
            <select class="form-control" name="tags[]" id="tags" multiple>
                @foreach($tagCompose as $id => $name)
                    <option value="{{$name}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>

            <button class="btn btn-primary isBack">{{trans('button.done_and_back')}}</button>
            <button type="reset" class="btn btn-default isBack">{{trans('button.reset')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
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