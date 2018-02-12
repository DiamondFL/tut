@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Doc_news_tag</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('doc-news-tag.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="doc_news_id">{{trans('label.doc_news_id')}}</label>
    <input type="number" class="form-control" name="doc_news_id"  id="doc_news_id">
</div>
<div class="form-group col-lg-6">
    <label for="doc_tag_id">{{trans('label.doc_tag_id')}}</label>
    <input type="number" class="form-control" name="doc_tag_id"  id="doc_tag_id">
</div>

    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
    </div>
</form>
@endsection