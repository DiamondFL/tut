@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i></a>
            </li>
            <li>
                <a href="{{route('tutorial.index')}}">{{trans('table.tutorials')}}</a>
            </li>
            <li class="active">
                <strong>Table</strong>
            </li>
        </ol>
        <form action="{{route('tutorial.update', $tutorial->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-12">
                <label for="name">{{trans('label.name')}}</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$tutorial->name}}">
            </div>
            <div class="form-group col-lg-12">
                <label for="description">{{trans('label.description')}}</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{!! $tutorial->description !!}</textarea>
            </div>
            <div class="col-lg-12 form-group">
                <label for="">{{__('label.no')}}</label>
                <ul class="list-group" id="sortable">
                    @foreach($sections as $id => $name)
                        <div class="input-group form-group">
                            <span class="input-group-addon no"></span>
                            <input type="hidden" name="section_ids[]" value="{{$id}}">
                            <input type="text" name="section_names[]" class="form-control" value="{{$name}}">
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="fileinput fileinput-newform-group col-lg-6 " data-provides="fileinput">
                <div class="fileinput-new thumbnail" data-trigger="fileinput">
                    <img class="img-responsive" src="{{$tutorial->img ? asset('storage') .$tutorial->img : 'http://placehold.it/200x150'}}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail img-responsive" ></div>
                <div>
                    <span class="btn btn-white btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="img" id="img" accept="image/*">
                    </span>
                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
                {{--<input type="file" name="img" id="img">--}}
            </div>
            <div class="form-group col-lg-12">
                <label for="is_active">{{trans('label.is_active')}}</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" {{$tutorial->is_active !== 1 ?: 'checked'}} name="is_active" id="is_active" value="1">
                    </label>
                </div>
            </div>
            <div class="col-lg-12 form-group">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <button class="btn btn-primary isBack">{{trans('button.done_and_back')}}</button>
                <button type="reset" class="btn btn-default isBack">{{trans('button.reset')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
@endsection
@push('head')

@endpush
@push('js')
    <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('build/forceSort.js')}}"></script>
    <script>
        forceSort('#sortable', '.no');
    </script>
@endpush