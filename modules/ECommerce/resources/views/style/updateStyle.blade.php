@extends('layout.main')
@section('title')
Cập nhật loại
@stop
@section('content')
   <form method="post">
        <input type="hidden" name='id' value="{{$style->id}}">
       <div class="input-group">
         <span class="input-group-addon"><div class="editGroupLabel">Tên loại</div></span>
         <input type="text" name="name" required="" value="{{$style->name}}" class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Hình ảnh</div></span>
         <input type="file" name="picture" class="form-control" >
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Chú thích</div></span>
         <textarea class='ckeditor' name="note" class="form-control" required="">{{$style->note}}</textarea>
       </div>
       <div class="input-group">
            <span class="input-group-addon " ><div class="editGroupLabel">Trạng thái</div></span>
         <input type="checkbox" name="active"  @if($style->active) checked="" @endif class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
         <input type="submit" required="" value="Cập nhật"  class="form-control btn-primary" >
       </div>
   </form>
@stop