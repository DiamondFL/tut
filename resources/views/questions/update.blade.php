@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title">{{trans('title.questions')}}</div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('questions.update', $questions->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-12">
    <label for="question">{{trans('label.question')}}</label>
    <textarea type="text" class="form-control ckeditor" name="question"  id="question">{{$questions->question}}</textarea>
</div>
<div class="form-group col-lg-6">
    <label for="score">{{trans('label.score')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="score"  id="score" value="{{$questions->score}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="type">{{trans('label.type')}}</label>
    <input type="text" class="form-control" name="type"  id="type" value="{{$questions->type}}" >
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection