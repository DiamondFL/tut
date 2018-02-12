@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('rg-result.index')}}">_name_</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div class="card">
    <div class="card-body">
        <form action="{{route('rg-result.update', $rgResult->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="rg_test_id">{{trans('label.rg_test_id')}}</label>
    <input type="number" class="form-control" name="rg_test_id"  id="rg_test_id" value="{{$rgResult->rg_test_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="score">{{trans('label.score')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="score"  id="score" value="{{$rgResult->score}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="rg_results_id">{{trans('label.rg_results_id')}}</label>
    <input type="number" class="form-control" name="rg_results_id"  id="rg_results_id" value="{{$rgResult->rg_results_id}}">
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection