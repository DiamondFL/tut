@extends('eco::layout.main')
@section('title')
Thêm tin tức
@stop
@section('content')
    @if($group->count())
   <form method="post">
       <div class="input-group">
         <span class="input-group-addon"><div class="editGroupLabel">Tên tin tức</div></span>
         <input type="text" name="title" required="" class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon"><div class="editGroupLabel">Tên nhóm</div></span>
         <select class="form-control" name="groupId">
            @foreach($group as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
         </select>
       </div>
       <!---------Ajax loại theo nhóm----------->
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Tên loại</div></span>
         <select class="form-control" name="styleId">
            @foreach($style as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
         </select>
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Giới thiệu</div></span>
         <textarea class='ckeditor' name="intro"  required=""></textarea>
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Chi tiết</div></span>
         <textarea class='ckeditor' name="details"  required=""></textarea>
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
         <input type="submit" required="" value="Thêm"  class="form-control btn-primary" >
       </div>
   </form>
   @else
        Nhóm trống bạn không thể thêm dữ liệu
   @endif
@stop