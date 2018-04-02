@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="/">{{trans('label.section')}}</a>
            </li>
            <li class="active">
                <strong>Tables</strong>
            </li>
        </ol>
        <form action="{{route('section.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group col-lg-9">
                <label for="name">{{trans('label.name')}}</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group col-lg-3">
                <label for="category">{{trans('label.tutorial_id')}}</label>
                <select class="form-control" name="tutorial_id" id="category_id">
                    <option value=""></option>
                    @foreach($tutorialCompose as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-lg-12">
                <lable>{{__('label.description')}}</lable>
                <textarea class="ckeditor form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="fileinput fileinput-newform-group col-lg-6 " data-provides="fileinput">
                <div class="fileinput-new thumbnail" data-trigger="fileinput">
                    <img class="img-responsive" src="http://placehold.it/200x150" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail img-responsive"></div>
                <div>
                    <span class="btn btn-white btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="img" id="img" accept="image/*">
                    </span>
                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
            <div class="form-group col-lg-12">
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
    </div>
@endsection