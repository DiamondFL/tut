@extends('layout.main')
@section('title')
Cập nhật tin tức
@stop
@section('content')
    @if($group->count())
   <form method="post">
        <input type="hidden" value="{{$news->id}}" name="id">
       <div class="input-group">
         <span class="input-group-addon"><div class="editGroupLabel">Tên tin tức</div></span>
         <input type="text" name="title" required="" value="{{$news->title}}" class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon"><div class="editGroupLabel">Tên nhóm</div></span>
         <select class="form-control" name="groupId">
            @foreach($group as $value)
                <option @if($news->groupId==$value->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
         </select>
       </div>
       <!---------Ajax loại theo nhóm----------->
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Tên loại</div></span>
         <select class="form-control" name="styleId">
            @foreach($style as $value)
                <option  @if($news->styleId==$value->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
         </select>
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Giới thiệu</div></span>
         <textarea class='ckeditor' name="intro" class="form-control" required="">{{$news->intro}}</textarea>
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Chi tiết</div></span>
         <textarea class='ckeditor' name="details" class="form-control" required="">{{$news->details}}</textarea>
       </div>
        <div class="input-group">
               <span class="input-group-addon " ><div class="editGroupLabel">Trạng thái</div></span>
            <input type="checkbox" name="active"  @if($news->active) checked="" @endif class="form-control">
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