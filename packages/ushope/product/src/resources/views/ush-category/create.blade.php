@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="/">{{ trans('ush-p::table.ush_categories') }}</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>
    <form id="categoryFrom" class="row" action="{{route('ush-category.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group col-lg-12">
            <label for="name">{{trans('label.name')}}</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group col-lg-12">
            <label for="name">{{trans('ush-p::label.sub_category')}}</label>
            <select style="width: 100%" class="js-example-basic-single" name="sub_category_names[]" id="sub_category_names" multiple="multiple">

            </select>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
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
        });
        $('.js-example-basic-single').on('select2:unselect', function (e) {
            var data = e.params.data;
            console.log(data);
        });
    });


</script>
@endpush