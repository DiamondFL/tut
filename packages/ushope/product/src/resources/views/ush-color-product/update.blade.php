@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('ush-color-product.index')}}">{{trans('ush-p::table.ush_color_products')}}</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div class="card">
    <div class="card-body">
        <form action="{{route('ush-color-product.update', $ushColorProduct->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group col-lg-6">
    <label for="ush_product_id">{{trans('ush-p::label.ush_product_id')}}</label>
    <input type="number" class="form-control" name="ush_product_id"  id="ush_product_id" value="{{$ushColorProduct->ush_product_id}}">
</div>
<div class="form-group col-lg-6">
    <label for="img">{{trans('ush-p::label.img')}}</label>
    <input type="text" class="form-control" name="img"  id="img" value="{{$ushColorProduct->img}}" >
</div>

            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection