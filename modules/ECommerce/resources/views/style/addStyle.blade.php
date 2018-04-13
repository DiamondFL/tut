@extends('layout.main')
@section('title')
Thêm loại
@stop
@section('content')
   <form method="post">
       <div class="input-group">
         <span class="input-group-addon" ><div class="editGroupLabel">Tên loại</div></span>
         <input type="text" name="name" required="" class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon" ><div class="editGroupLabel">Hình ảnh</div></span>
         <input type="file" name="picture" class="form-control" >
       </div>
       <div class="input-group">
         <span class="input-group-addon" ><div class="editGroupLabel">Chú thích</div></span>
         <textarea class='ckeditor' name="note" class="form-control" required="" ></textarea>
       </div>
       <div class="input-group">
         <span class="input-group-addon" ><div class="editGroupLabel"></div></span>
         <input type="submit" required="" value="Thêm"  class="form-control btn-primary" >
       </div>
   </form>
@stop