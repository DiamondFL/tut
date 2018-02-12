@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="/">_name_</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>

    <form class="row" action="{{route('ush-color.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-12">
            <label for="icon">{{trans('label.code')}}</label>
            {{--<input type="text" class="form-control" name="code" id="code">--}}

            <div id="cp2" class="input-group colorpicker-component" title="Using input value">
                <input type="text" class="form-control input-lg"  name="code" id="code"/>
                <span class="input-group-addon"><i></i></span>
            </div>
        </div>
        <div class="form-group col-lg-12">
            <label for="icon">{{trans('label.code')}}</label>
            {{--<input type="text" class="form-control" name="code" id="code">--}}

            <div id="cp2" class="input-group colorpicker-component" title="Using input value">
                <input type="text" class="form-control input-lg"  name="code1" id="code1"/>
                <span class="input-group-addon"><i></i></span>
            </div>
        </div>

        <div class="form-group col-lg-12">
            <label for="icon">{{trans('label.icon')}}</label>
            <input type="file" name="icon" id="icon">
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
@endpush

@push('js')
<script src="{{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script>
    $(function () {
        $('#cp2, #cp3a, #cp3b').colorpicker();
        $('#cp4').colorpicker({"color": "#16813D"});
    });
</script>
@endpush
