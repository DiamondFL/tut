@extends('eco::layout.main')
@section('title')
    Thêm sản phẩm
@stop
@section('content')
    @if($group->count())
        <form class="form-horizontal" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-lg-6">
                <label class="control-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm">
            </div>
            <div class="col-lg-3">
                <label class="control-label">Nhóm sản phẩm</label>
                <select class="form-control" id="groupId" name="groupId">
                    @foreach($group as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3">
                <label class="control-label">Loại sản phẩm</label>
                <select class="form-control" id="styleId" name="styleId">
                    @foreach($style as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3">
                <label class="control-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="giá">
            </div>

            <div class="col-lg-3">
                <label class="control-label">Khuyến mãi</label>
                <input type="number" id="discount" name="discount" class="form-control">
            </div>
            <div class="col-lg-2">
                <label class="control-label">Số lượng</label>
                <input type="number" id="total" name="total" class="form-control">
            </div>

            <div class="col-lg-2">
                <label class="control-label">Ưu tiên</label>
                <input type="checkbox" id="recommended" name="recommended" class="form-control">
            </div>
            <div class="col-lg-2">
                <label class="control-label">Trạng thái</label>
                <input type="checkbox" name="active" value="1" checked id="active" class="form-control">
            </div>
            <div class="col-lg-12">
                <label class="control-label">Giới thiệu</label>
                <textarea class="ckeditor" name="intro" id="introProduct"></textarea>
            </div>
            <div class="col-lg-12">
                <label class="control-label">Chi tiết</label>
                <textarea class="ckeditor" name="details" id="detailsProduct"></textarea>
            </div>
            <div class="col-lg-6">
                <label class="control-label">Hình ảnh</label>
                <input type="file" id="picture" name="picture">
            </div>
            <div class="col-lg-12">
                <label class="control-label"></label>
                <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                <button type="reset" class=" form-control btn btn-warning btn-block">Làm lại</button>
            </div>
        </form>
    @else
        Nhóm trống bạn không thể thêm dữ liệu
    @endif
@stop
