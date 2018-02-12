@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title">{{trans('title.scores')}}</div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('scores.update', $scores->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="score">{{trans('label.score')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="score"  id="score" value="{{$scores->score}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="no_answer">{{trans('label.no_answer')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="no_answer"  id="no_answer" value="{{$scores->no_answer}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="no_question">{{trans('label.no_question')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="no_question"  id="no_question" value="{{$scores->no_question}}">
        </label>
    </div>
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection