@extends('eco::layout.main')
@section('title')
Thêm loại
@stop
@section('content')
   <form method="post" action="{{route('style.store')}}">
       {{csrf_field()}}
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
         <textarea class='ckeditor' name="note" required="" ></textarea>
       </div>
       <div class="input-group">
         <span class="input-group-addon" ><div class="editGroupLabel">Active</div></span>
         <input type="checkbox" name="is_active" checked class="form-control" value="1" >
       </div>
       <div class="input-group">
         <span class="input-group-addon" ><div class="editGroupLabel"></div></span>
         <input type="submit" required="" value="Thêm"  class="form-control btn-primary" >
       </div>
   </form>
@stop