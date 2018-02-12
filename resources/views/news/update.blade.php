@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group col-lg-6">
                    <label for="title">{{trans('label.title')}}</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
                </div>
                <div class="form-group col-lg-12">
                    <label for="intro">{{trans('label.intro')}}</label>
                    <textarea type="text" class="form-control ckeditor" name="intro"
                              id="intro">{{$news->intro}}</textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="content">{{trans('label.content')}}</label>
                    <textarea type="text" class="form-control ckeditor" name="content"
                              id="content">{{$news->content}}</textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="description">{{trans('label.index')}}</label>
                    <textarea type="text" class="form-control ckeditor" name="index" id="index">{{$news->index}}</textarea>
                </div>
                <div class="form-group col-lg-6">
                    <label for="views">{{trans('label.views')}}</label>
                    <input type="number" class="form-control" name="views" id="views" value="{{$news->views}}">
                </div>
                <div class="form-group col-lg-6">
                    <label for="source">{{trans('label.source')}}</label>
                    <input type="text" class="form-control" name="source" id="source" value="{{$news->source}}">
                </div>
                {{--<div class="panel-body">--}}
                    {{--<p>Add Post Tags</p>--}}
                    {{--<input type="text" value="weekend,friday,happy,awesome,chill,healthy" class="form-control tagsinput" />--}}

                {{--</div>--}}
                <div class="form-group col-lg-6">
                    <label for="is_active">{{trans('label.is_active')}}</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="is_active" id="is_active" value="{{$news->is_active}}">
                        </label>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label for="is_hot">{{trans('label.is_hot')}}</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="is_hot" id="is_hot" value="{{$news->is_hot}}">
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

@push('js')
<script src="{{asset('')}}assets/js/bootstrap-tagsinput.min.js"></script>
@endpush