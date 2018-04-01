@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="{{route('lesson.index')}}">{{trans('tut::table.lesson')}}</a>
            </li>
            <li class="active">
                <strong>Table</strong>
            </li>
        </ol>
        <form action="{{route('lesson.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group col-lg-6">
                <label for="title">{{trans('label.title')}}</label>
                <input type="text" class="form-control" value="{{$lesson->title}}" name="title" id="title">
            </div>
            <div class="form-group col-lg-3">
                <label for="title">{{trans('label.tutorial')}}</label>
                <select class="form-control" name="tutorial_id" id="tutorial_id">
                    <option value=""></option>
                    @foreach($tutorialCompose as $id => $name)
                        <option value="{{$id}}" {{$id !==  $tutorial_id? : 'selected'}}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label for="title">{{trans('label.section')}}</label>
                <select class="form-control" name="section_id" id="section_id">
                    @foreach($sectionList as $id => $name)
                        <option value="{{$id}}" {{$id !== $lesson->section_id ? : 'selected'}}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-12">
                <label for="intro">{{trans('label.intro')}}</label>
                <textarea class="form-control ckeditor" name="intro" id="intro">{{$lesson->intro}}</textarea>
            </div>
            <div class="form-group col-lg-12">
                <label for="content">{{trans('label.content')}}</label>
                <textarea class="form-control ckeditor" name="content" id="content">{{$lesson->content}}</textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="is_active">{{trans('label.is_active')}}</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" {{ $lesson->is_active == 1 ? 'checked' : '' }} name="is_active" id="is_active">
                    </label>
                </div>
            </div>
            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
        <input type="hidden" value="{{route('section.list')}}" id="sectionListRoute">
    </div>
@endsection

@push('js')
    <script src="{{asset('build/forceSelect.js?v=0')}}"></script>
    <script>
        var categorySelect = $('#tutorial_id');
        var route = $('#sectionListRoute').val();
        var config = {
            route: route,
            isSelect: '#section_id',
            name: 'tutorial_id'
        };
        categorySelect.magicSelect(config);
    </script>
@endpush