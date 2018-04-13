@extends('layout.main')
@section('title')
Thêm sản phẩm
@stop
@section('content')
    @if($group->count())
   <form class="form-horizontal" method="post"  enctype="multipart/form-data">
     <div>
       <label class="col-sm-2 control-label">Tên sản phẩm</label>
       <div class="col-sm-4">
         <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm">
       </div>
     </div>
     <div>
       <label for="inputPassword3" class="col-sm-1 control-label">Giá</label>
       <div class="col-sm-2">
         <input type="number" class="form-control" id="price" name="price" placeholder="giá">
       </div>
     </div>
     <div>
       <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
       <div class="col-sm-1">
         <span class="btn btn-outline btn-file glyphicon glyphicon-upload"><input type="file" class="form-control" id="picture" name="picture"></span>
       </div>
     </div>
     <div>
       <label for="inputPassword3" class="col-sm-2 control-label">Nhóm sản phẩm</label>
       <div class="col-sm-4">
          <select class="form-control" id="groupId" name="groupId">
             @foreach($group as $value)
                 <option value="{{$value->id}}">{{$value->name}}</option>
             @endforeach
          </select>
       </div>
     </div>

     <div>
        <label for="inputPassword3" class="col-sm-2 control-label">Khuyến mãi</label>
        <div class="col-sm-1">
           <input type="number" id="discount" name="discount" class="form-control">
        </div>
      </div>
      <div>
        <label for="inputPassword3" class="col-sm-2 control-label">Số lượng</label>
        <div class="col-sm-1">
           <input type="number" id="total" name="total" class="form-control">
        </div>
      </div>
      <div>
         <label for="inputPassword3" class="col-sm-2 control-label">Loại sản phẩm</label>
         <div class="col-sm-4">
            <select class="form-control" id="styleId" name="styleId">
                @foreach($style as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
             </select>
         </div>
       </div>
      <div>
        <label for="inputPassword3" class="col-sm-2 control-label">Ưu tiên</label>
        <div class="col-sm-1">
           <input type="checkbox" id="recommended" name="recommended" class="form-control">
        </div>
      </div>
      <div>
        <label for="inputPassword3" class="col-sm-2 control-label">Trạng thái</label>
        <div class="col-sm-1">
           <input type="checkbox" name="active" id="active" class="form-control">
        </div>
      </div>
      <div>
        <label for="inputPassword3" class="col-sm-2 control-label">Giới thiệu</label>
        <div class="col-sm-10">
           <textarea class="ckeditor" name="intro" id="introProduct"></textarea>
        </div>
      </div>
      <div>
        <label for="inputPassword3" class="col-sm-2 control-label">Chi tiết</label>
        <div class="col-sm-10">
           <textarea  class="ckeditor" name="details" id="detailsProduct"></textarea>
        </div>
      </div>
      <div>
        <label for="inputPassword3" class="col-sm-2 control-label"></label>
        <div class="col-sm-5">
           <button type="submit" class="btn btn-primary btn-block">Thêm</button>
        </div>
        <div class="col-sm-5">
           <button type="reset" class=" form-control btn btn-warning btn-block">Làm lại</button>
        </div>
      </div>
   </form>
   @else
        Nhóm trống bạn không thể thêm dữ liệu
   @endif
@stop
