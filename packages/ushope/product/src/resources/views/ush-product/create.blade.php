@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i>Home</a>
    </li>
    <li>
        <a href="/">Ush_product</a>
    </li>
    <li class="active">
        <strong>Tables</strong>
    </li>
</ol>

<form class="row" action="{{route('ush-product.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group col-lg-6">
    <label for="name">{{trans('ush-p::label.name')}}</label>
    <input type="text" class="form-control" name="name"  id="name">
</div>
{{--<div class="form-group col-lg-3">--}}
    {{--<label for="rate">{{trans('ush-p::label.rate')}}</label>--}}
    {{--<input type="text" class="form-control" name="name"  id="name">--}}
{{--</div>--}}

{{--<div class="form-group col-lg-3">--}}
    {{--<label for="no_rate">{{trans('ush-p::label.no_rate')}}</label>--}}
    {{--<input type="number" class="form-control" name="no_rate"  id="no_rate">--}}
{{--</div>--}}
<div class="form-group col-lg-6">
    <label for="ush_category_id">{{trans('ush-p::label.ush_category_id')}}</label>
    <select class="form-control" name="ush_category_id"  id="ush_category_id">
        <option value=""></option>
        @foreach($categoryCompose as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
{{--<div class="form-group col-lg-6">--}}
    {{--<label for="ush_group_id">{{trans('ush-p::label.ush_group_id')}}</label>--}}
    {{--<select class="form-control" name="ush_group_id"  id="ush_group_id">--}}
        {{--<option value=""></option>--}}
        {{--@foreach($groupCompose as $id => $name)--}}
            {{--<option value="{{$id}}">{{$name}}</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
{{--</div>--}}
<div class="form-group col-lg-6">
    <label for="ush_seasonal_id">{{trans('ush-p::label.ush_seasonal_id')}}</label>
    <select class="form-control" name="ush_seasonal_id"  id="ush_seasonal_id">
        <option value=""></option>
        @foreach($seasonCompose as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-lg-6">
    <label for="ush_feature_id">{{trans('ush-p::label.ush_feature_id')}}</label>
    <select class="form-control" name="ush_feature_id"  id="ush_feature_id">
        <option value=""></option>
        @foreach($featureCompose as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-lg-6">
    <label for="ush_material_id">{{trans('ush-p::label.ush_material_id')}}</label>
    <select class="form-control" name="ush_material_id"  id="ush_material_id">
        <option value=""></option>
        @foreach($materialCompose as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-lg-6">
    <label for="ush_brand_id">{{trans('ush-p::label.ush_brand_id')}}</label>
    <select class="form-control" name="ush_brand_id"  id="ush_brand_id">
        <option value=""></option>
        @foreach($brandCompose as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>
{{--<div class="form-group col-lg-6">--}}
    {{--<label for="ush_weight_id">{{trans('ush-p::label.ush_weight_id')}}</label>--}}
    {{--<select class="form-control" name="ush_weight_id"  id="ush_weight_id">--}}
        {{--<option value=""></option>--}}
        {{--@foreach($weightCompose as $id => $name)--}}
            {{--<option value="{{$id}}">{{$name}}</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
{{--</div>--}}
{{--<div class="form-group col-lg-6">--}}
    {{--<label for="ush_price_id">{{trans('ush-p::label.ush_price_id')}}</label>--}}
    {{--<select class="form-control" name="ush_price_id"  id="ush_price_id">--}}
        {{--<option value=""></option>--}}
        {{--@foreach($priceCompose as $id => $name)--}}
            {{--<option value="{{$id}}">{{$name}}</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
{{--</div>--}}
{{--<div class="form-group col-lg-6">--}}
    {{--<label for="ush_fit_id">{{trans('ush-p::label.ush_fit_id')}}</label>--}}
    {{--<input type="number" class="form-control" name="ush_fit_id"  id="ush_fit_id">--}}
{{--</div>--}}
{{--<div class="form-group col-lg-6">--}}
    {{--<label for="ush_specialty_size_id">{{trans('ush-p::label.ush_specialty_size_id')}}</label>--}}
    {{--<select class="form-control" name="ush_specialty_size_id"  id="ush_specialty_size_id">--}}
        {{--<option value=""></option>--}}
        {{--@foreach($specialtySizeCompose as $id => $name)--}}
            {{--<option value="{{$id}}">{{$name}}</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
{{--</div>--}}
<div class="form-group col-lg-6">
    <label for="img">{{trans('ush-p::label.img')}}</label>
    <input type="file" class="form-control" name="img"  id="img">
</div>

<div class="form-group col-lg-6">
    <label for="img_plus">{{trans('ush-p::label.img_plus')}}</label>
    <input type="file" class="form-control" name="img_plus"  id="img_plus">
</div>

<div class="form-group col-lg-6">
    <label for="price">{{trans('ush-p::label.price')}}</label>
    <input type="number" class="form-control" name="price"  id="price">
</div>
<div class="form-group col-lg-6">
    <label for="minimum_order">{{trans('ush-p::label.minimum_order')}}</label>
    <input type="number" class="form-control" name="minimum_order" id="minimum_order">
</div>

{{--<div class="form-group col-lg-6">--}}
    {{--<label for="items">{{trans('ush-p::label.items')}}</label>--}}
    {{--<div class="checkbox">--}}
        {{--<label>--}}
            {{--<input type="checkbox" name="items"  id="items" >--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group col-lg-12">
    <label for="content">{{trans('ush-p::label.content')}}</label>
    <textarea type="text" class="form-control ckeditor" name="content"  id="content"></textarea>
</div>

    <div class="col-lg-12">
        <button class="btn btn-primary">{{trans('ush-p::button.done')}}</button>
        <a href="{{url()->previous()}}" class="btn btn-default">{{trans('ush-p::button.cancel')}}</a>
    </div>
</form>
@endsection