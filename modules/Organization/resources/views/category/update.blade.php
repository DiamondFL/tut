@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{route('-category.index')}}">_name_</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <div class="card">
        <div class="card-body">
            <form action="{{route('-category.update', $Category->id)}}" method="POST" >
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group col-lg-6">
                    <label for="name">{{trans('label.name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$Category->name}}">
                </div>
                <div class="form-group col-lg-12">
                    <label for="name">{{trans('organ::label._category')}}</label>
                    <select style="width: 100%" class="js-example-basic-single" name="_category_names[]" id="_category_names" multiple="multiple">
                        @foreach($Categories as $id => $name)
                            <option selected value="{{$id}}"> {{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary">{{trans('button.done')}}</button>
                    <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
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
        $('.js-example-basic-single').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
            $.ajax({
                url: '{{route("--category.store")}}',
                method: "POST",
                data: {name: data.text, category_id: '{{$Category->id}}'},
                success: function (data) {
//                    alert('Success');
                },
                error: function (err) {
                    alert('Error');
                }
            });
        });
        $('.js-example-basic-single').on('select2:unselect', function (e) {
            var data = e.params.data;
            console.log(data);
            $.ajax({
                url: '{{route("--category.index")}}/' + data.id,
                method: "DELETE",
                success: function (data) {
//                    alert('Success');
                },
                error: function (err) {
                    alert('Error');
                }
            });
        });
    });
</script>
@endpush