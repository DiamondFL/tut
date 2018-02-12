@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Doc_example_tag</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('doc-example-tag.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="doc_tag_id">{{trans('label.doc_tag_id')}}</label>
    <input type="number" class="form-control" name="doc_tag_id"  id="doc_tag_id">
</div>
<div class="form-group col-lg-6">
    <label for="doc_example_id">{{trans('label.doc_example_id')}}</label>
    <input type="number" class="form-control" name="doc_example_id"  id="doc_example_id">
</div>

    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection