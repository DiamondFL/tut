@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{route('multi_choices.index')}}">Multi choice</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>
    <form class="row" action="{{route('multi_choices.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-12">
            <label for="question">{{trans('label.question')}}</label>
            <textarea type="text" class="form-control ckeditor" name="question" id="question"></textarea>
        </div>
        <div class="form-group col-lg-6">
            <label for="reply1">{{trans('label.reply1')}}</label>
            <input type="text" class="form-control" name="reply1" id="reply1">
        </div>

        <div class="form-group col-lg-6">
            <label for="reply2">{{trans('label.reply2')}}</label>
            <input type="text" class="form-control" name="reply2" id="reply2">
        </div>

        <div class="form-group col-lg-6">
            <label for="reply3">{{trans('label.reply3')}}</label>
            <input type="text" class="form-control" name="reply3" id="reply3">
        </div>

        <div class="form-group col-lg-6">
            <label for="reply4">{{trans('label.reply4')}}</label>
            <input type="text" class="form-control" name="reply4" id="reply4">
        </div>

        <div class="form-group col-lg-6">
            <label for="reply5">{{trans('label.reply5')}}</label>
            <input type="text" class="form-control" name="reply5" id="reply5">
        </div>

        <div class="form-group col-lg-6">
            <label for="answer">{{trans('label.answer')}}</label>
            <input type="number" class="form-control" name="answer" id="answer">
        </div>
        <div class="form-group col-lg-6">
            <label for="level">{{trans('label.level')}}</label>
            <select class="form-control" name="level" id="level">
                @foreach(LEVEL as $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-6">
            <label for="knowledge">{{trans('label.knowledge')}}</label>
            <select class="form-control" name="knowledge" id="knowledge">
                @foreach(KNOWLEDGE as $id => $value)
                    <option value="{{$id}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-6">
            <label for="professional">{{trans('label.professional')}}</label>
            <select class="form-control" name="professional" id="professional">
                @foreach(PROFESSIONAL as $id => $value)
                    <option value="{{$id}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection