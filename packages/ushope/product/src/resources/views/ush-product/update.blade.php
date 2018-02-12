@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('ush-product.index')}}">_name_</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div class="card">
    <div class="card-body">
        <form action="{{route('ush-product.update', $_var_->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="name">{{trans('ush-p::label.name')}}</label>
    <input type="text" class="form-control" name="name"  id="name" value="{{$_var_->name}}" >
</div>
<div class="form-group col-lg-6">
    <label for="rate">{{trans('ush-p::label.rate')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="rate"  id="rate" value="{{$_var_->rate}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="no_rate">{{trans('ush-p::label.no_rate')}}</label>
    <input type="number" class="form-control" name="no_rate"  id="no_rate" value="{{$_var_->no_rate}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_category_id">{{trans('ush-p::label.ush_category_id')}}</label>
    <input type="number" class="form-control" name="ush_category_id"  id="ush_category_id" value="{{$_var_->ush_category_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_group_id">{{trans('ush-p::label.ush_group_id')}}</label>
    <input type="number" class="form-control" name="ush_group_id"  id="ush_group_id" value="{{$_var_->ush_group_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_seasonal_id">{{trans('ush-p::label.ush_seasonal_id')}}</label>
    <input type="number" class="form-control" name="ush_seasonal_id"  id="ush_seasonal_id" value="{{$_var_->ush_seasonal_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_feature_id">{{trans('ush-p::label.ush_feature_id')}}</label>
    <input type="number" class="form-control" name="ush_feature_id"  id="ush_feature_id" value="{{$_var_->ush_feature_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_material_id">{{trans('ush-p::label.ush_material_id')}}</label>
    <input type="number" class="form-control" name="ush_material_id"  id="ush_material_id" value="{{$_var_->ush_material_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_brand_id">{{trans('ush-p::label.ush_brand_id')}}</label>
    <input type="number" class="form-control" name="ush_brand_id"  id="ush_brand_id" value="{{$_var_->ush_brand_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_weight_id">{{trans('ush-p::label.ush_weight_id')}}</label>
    <input type="number" class="form-control" name="ush_weight_id"  id="ush_weight_id" value="{{$_var_->ush_weight_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_price_id">{{trans('ush-p::label.ush_price_id')}}</label>
    <input type="number" class="form-control" name="ush_price_id"  id="ush_price_id" value="{{$_var_->ush_price_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_fit_id">{{trans('ush-p::label.ush_fit_id')}}</label>
    <input type="number" class="form-control" name="ush_fit_id"  id="ush_fit_id" value="{{$_var_->ush_fit_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="ush_specialty_size_id">{{trans('ush-p::label.ush_specialty_size_id')}}</label>
    <input type="number" class="form-control" name="ush_specialty_size_id"  id="ush_specialty_size_id" value="{{$_var_->ush_specialty_size_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="img">{{trans('ush-p::label.img')}}</label>
    <input type="text" class="form-control" name="img"  id="img" value="{{$_var_->img}}" >
</div>
<div class="form-group col-lg-6">
    <label for="img_plus">{{trans('ush-p::label.img_plus')}}</label>
    <input type="text" class="form-control" name="img_plus"  id="img_plus" value="{{$_var_->img_plus}}" >
</div>
<div class="form-group col-lg-6">
    <label for="price">{{trans('ush-p::label.price')}}</label>
    <input type="number" class="form-control" name="price"  id="price" value="{{$_var_->price}}">
</div>
<div class="form-group col-lg-6">
    <label for="minimum_order">{{trans('ush-p::label.minimum_order')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="minimum_order"  id="minimum_order" value="{{$_var_->minimum_order}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-6">
    <label for="items">{{trans('ush-p::label.items')}}</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="items"  id="items" value="{{$_var_->items}}">
        </label>
    </div>
</div>
<div class="form-group col-lg-12">
    <label for="content">{{trans('ush-p::label.content')}}</label>
    <textarea type="text" class="form-control ckeditor" name="content"  id="content">{{$_var_->content}}</textarea>
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('ush-p::button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('ush-p::button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection