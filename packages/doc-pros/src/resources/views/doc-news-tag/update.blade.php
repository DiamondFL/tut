@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('doc-news-tag.index')}}">_name_</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div class="card">
    <div class="card-body">
        <form action="{{route('doc-news-tag.update', $docNewsTag->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="doc_news_id">{{trans('label.doc_news_id')}}</label>
    <input type="number" class="form-control" name="doc_news_id"  id="doc_news_id" value="{{$docNewsTag->doc_news_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="doc_tag_id">{{trans('label.doc_tag_id')}}</label>
    <input type="number" class="form-control" name="doc_tag_id"  id="doc_tag_id" value="{{$docNewsTag->doc_tag_id}}">
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection