@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="/">Tag</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>

    <form class="row" action="{{route('doc-tag.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-12">
            <label for="name">{{trans('label.name')}}</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <button class="btn btn-primary isBack">{{trans('button.done_and_back')}}</button>
            <button type="reset" class="btn btn-default isBack">{{trans('button.reset')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection