@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Rg_result</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('rg-result.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="rg_test_id">{{trans('label.rg_test_id')}}</label>
    <input type="number" class="form-control" name="rg_test_id"  id="rg_test_id">
</div>
<div class="form-group col-lg-6">
    <label for="score">{{trans('label.score')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="score"  id="score" >
        </label>
    </div>
</div>

<div class="form-group col-lg-6">
    <label for="rg_results_id">{{trans('label.rg_results_id')}}</label>
    <input type="number" class="form-control" name="rg_results_id"  id="rg_results_id">
</div>

    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection