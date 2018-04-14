@extends('eco::layout.main')
@section('title')
    Cập nhật sản phẩm
@stop
@section('content')
    <form class="form-horizontal" method="post" action="{{route('product.update', $product->id)}}"
          enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="col-lg-6">
            <label class="control-label">Tên sản phẩm</label>
            <input type="text" value="{{$product->name}}" class="form-control" id="name" name="name" placeholder="Tên sản phẩm">
        </div>
        <div class="col-lg-3">
            <label class="control-label">Nhóm sản phẩm</label>
            <select class="form-control" id="groupId" name="groupId">
                @foreach($group as $value)
                    <option {{$product->groupId === $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3">
            <label class="control-label">Loại sản phẩm</label>
            <select class="form-control" id="styleId" name="styleId">
                @foreach($style as $value)
                    <option {{$product->styleId === $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3">
            <label class="control-label">Giá</label>
            <input type="number" value="{{$product->price}}" class="form-control" id="price" name="price" placeholder="giá">
        </div>

        <div class="col-lg-3">
            <label class="control-label">Khuyến mãi</label>
            <input type="number" value="{{$product->discount}}" id="discount" name="discount" class="form-control">
        </div>
        <div class="col-lg-2">
            <label class="control-label">Số lượng</label>
            <input type="number" id="total" value="{{$product->total}}" name="total" class="form-control">
        </div>

        <div class="col-lg-2">
            <label class="control-label">Ưu tiên</label>
            <input type="checkbox" value="{{$product->recommended}}" id="recommended" name="recommended" class="form-control">
        </div>
        <div class="col-lg-2">
            <label class="control-label">Trạng thái</label>
            <input type="checkbox" value="{{$product->is_active == 1 ? 'checked': ''}}" name="is_active" value="1" checked id="is_active" class="form-control">
        </div>
        <div class="col-lg-12">
            <label class="control-label">Giới thiệu</label>
            <textarea class="ckeditor" name="intro" id="introProduct">{{$product->intro}}</textarea>
        </div>
        <div class="col-lg-12">
            <label class="control-label">Chi tiết</label>
            <textarea class="ckeditor" name="details" id="detailsProduct">{{$product->details}}</textarea>
        </div>
        <div class="col-lg-6">
            <label class="control-label">Hình ảnh</label>
            <input type="file" id="picture" name="picture">
        </div>
        <div class="col-lg-12">
            <label class="control-label"></label>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
            <button type="reset" class=" form-control btn btn-warning btn-block">Làm lại</button>
        </div>
    </form>
@stop
