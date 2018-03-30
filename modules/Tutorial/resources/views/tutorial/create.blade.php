@extends('layouts.app')
@section('content')
    <div class="row">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="{{route('tutorial.index')}}">{{trans('label.tutorial')}}</a>
            </li>
            <li class="active">
                <strong>Tables</strong>
            </li>
        </ol>
        <form action="{{route('tutorial.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group col-lg-12">
                <label for="name">{{trans('label.name')}}</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-lg-12">
                <label for="img">{{trans('label.img')}}</label>
                <input type="file"  name="img" id="img">
            </div>
            <div class="form-group col-lg-12">
                <label for="name">{{trans('tut::label.lesson')}}</label>
                <select style="width: 100%" class="js-single" name="lesson_names[]" id="lesson_names" multiple="multiple">

                </select>
            </div>
            <div class="form-group col-lg-12">
                <label for="description">{{trans('tut::label.description')}}</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
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
    </div>
@endsection

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#categoryFrom").validate();
        $(document).ready(function() {
            $('.js-single').select2({
                tags: true,
                createTag: function (params) {
                    var term = $.trim(params.term);
                    if (term === '') {
                        return null;
                    }
                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                }
            });
            $('.js-single').on('select2:select', function (e) {
                var data = e.params.data;
                console.log(data);
            });
            $('.js-single').on('select2:unselect', function (e) {
                var data = e.params.data;
                console.log(data);
            });
        });
    </script>
@endpush