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

    <form class="row" action="{{route('multi-choices.update', $mini_multi_choice->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-12">
            <label for="question">{{trans('label.question')}}</label>
            <textarea type="text" class="form-control ckeditor" name="question" id="question">{{$mini_multi_choice->question}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="reply1">{{trans('label.reply1')}}</label>
            <textarea type="text" class="form-control ckeditor" name="reply1" id="reply1">{{$mini_multi_choice->reply1}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="reply2">{{trans('label.reply2')}}</label>
            <textarea type="text" class="form-control ckeditor" name="reply2" id="reply2">{{$mini_multi_choice->reply2}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="reply3">{{trans('label.reply3')}}</label>
            <textarea type="text" class="form-control ckeditor" name="reply3" id="reply3">{{$mini_multi_choice->reply3}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="reply4">{{trans('label.reply4')}}</label>
            <textarea type="text" class="form-control ckeditor" name="reply4" id="reply4">{{$mini_multi_choice->reply4}}</textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="reply5">{{trans('label.reply5')}}</label>
            <textarea type="text" class="form-control ckeditor" name="reply5" id="reply5">{{$mini_multi_choice->reply5}}</textarea>
        </div>
        <div class="form-group col-lg-2">
            <label for="answer">{{trans('label.answer')}}</label>
            <select class="form-control" name="" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection