@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="index.html"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="tables-main.html">Tables</a>
        </li>
        <li class="active">
            <strong>Basic Tables</strong>
        </li>
    </ol>

    <form class="row" action="{{route('vocabularies.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-6">
            <label for="word">{{trans('label.word')}}</label>
            <input type="text" class="form-control" name="word" id="word">
        </div>

        <div class="form-group col-lg-6">
            <label for="type">{{trans('label.type')}}</label>
            <input type="text" class="form-control" name="type" id="type">
        </div>

        <div class="form-group col-lg-6">
            <label for="pronounce">{{trans('label.pronounce')}}</label>
            <input type="text" class="form-control" name="pronounce" id="pronounce">
        </div>

        <div class="form-group col-lg-6">
            <label for="meaning">{{trans('label.meaning')}}</label>
            <input type="text" class="form-control" name="meaning" id="meaning">
        </div>

        <div class="form-group col-lg-6">
            <label for="image">{{trans('label.image')}}</label>
            <input type="file" name="image" id="image">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="form-group col-lg-12">
            <label for="description">{{trans('label.description')}}</label>
            <textarea type="text" class="form-control ckeditor" name="description" id="description"></textarea>
        </div>
        <div class="form-group col-lg-6">
            <label for="is_active">{{trans('label.is_active')}}</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="is_active" id="is_active">
                </label>
            </div>
        </div>


        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection