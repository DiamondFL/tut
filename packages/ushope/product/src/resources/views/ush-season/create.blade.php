@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Ush_season</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('ush-season.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="name">{{trans('label.name')}}</label>
    <input type="text" class="form-control" name="name"  id="name">
</div>


    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection