@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="{{route('lesson-test.index')}}">{{trans('tut::table.lesson_test')}}</a>
            </li>
            <li class="active">
                <strong>{{trans('label.update')}}</strong>
            </li>
        </ol>

        <form action="{{route('lesson-test.update', $lessonTest->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-4">
                <label for="tutorial_id">{{trans('label.tutorial')}}</label>
                <select  class="form-control" name="tutorial_id" id="tutorial_id">
                    <option value=""></option>
                    @foreach($tutorialCompose as $id => $name)
                        <option value="{{$id}}" {{$id !== $tutorial_id ?: 'selected' }}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-4">
                <label for="lesson_id">{{trans('label.section')}}</label>
                <select class="form-control" name="section_id" id="section_id">
                    @foreach($sectionList as $id => $name)
                        <option value="{{$id}}" {{$id !== $section_id ?: 'selected' }}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-4">
                <label for="lesson_id">{{trans('label.lesson')}}</label>
                <select required class="form-control" name="lesson_id" id="lesson_id">
                    @foreach($lessonList as $id => $name)
                        <option value="{{$id}}" {{$id !== $lessonTest->section_id ?: 'selected' }}>{{$name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-lg-12">
                <label for="questions">{{trans('label.questions')}}</label>
                <textarea class="form-control ckeditor" name="question" id="question">{!! $lessonTest->question !!}</textarea>
            </div>
            @for($i=1; $i<=4; $i++)
                <div class="form-group col-lg-12">
                    <label for="{{$reply = 'reply' . $i}}">{{trans('label.reply' . $i)}}</label>
                    <div class="input-group">
                        <input type="text" required value="{{$lessonTest->$reply}}" class="form-control" name="{{$reply}}">
                        <span class="input-group-addon">
                            <input type="radio" name="answer" {{$lessonTest->answer === $i ? 'checked' : ''}} id="answer" value="{{$i}}">
                        </span>
                    </div><!-- /input-group -->
                </div>
            @endfor

            <div class="form-group col-lg-6">
                <label for="is_active">{{trans('label.is_active')}}</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked value="1" name="is_active" id="is_active">
                    </label>
                </div>
            </div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <button class="btn btn-primary isBack">{{trans('button.done_and_back')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
            <input type="hidden" value="{{route('section.list')}}" id="sectionListRoute">
            <input type="hidden" value="{{route('lesson.list')}}" id="lessonListRoute">
        </form>
    </div>
@endsection


@push('js')
    <script src="{{asset('build/forceSelect.js?v=0')}}"></script>
    <script>
        var tutorialSelect = $('#tutorial_id');
        var route = $('#sectionListRoute').val();
        var config = {
            route: route,
            isSelect: '#section_id',
            name: 'tutorial_id'
        };
        tutorialSelect.magicSelect(config);

        var sectionSelect = $('#section_id');
        var route1 = $('#lessonListRoute').val();
        var config1 = {
            route: route1,
            isSelect: '#lesson_id',
            name: 'section_id'
        };
        sectionSelect.magicSelect(config1);
    </script>
@endpush