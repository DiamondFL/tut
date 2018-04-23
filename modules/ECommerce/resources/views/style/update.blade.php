@extends('eco::layout.main')
@section('title')
Cập nhật loại
@stop
@section('content')
   <form method="post" action="{{route('style.update', $style->id)}}">
       {{csrf_field()}}
       {{method_field('PUT')}}
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
         <input type="checkbox" name="is_active"  @if($style->is_active) checked @endif class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
         <input type="submit" required="" value="Cập nhật"  class="form-control btn-primary" >
       </div>
   </form>
@stop