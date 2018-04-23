@extends('eco::layout.main')
@section('title')
Cập nhật nhóm
@stop
@section('content')
   <form method="POST" action="{{route('group.update', $data->id)}}">
       {{method_field('PUT')}}
       {!! csrf_field() !!}
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Tên nhóm</div></span>
         <input type="text" name="name" required="" value="{{$data->name}}" class="form-control">
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Hình ảnh</div></span>
         <input type="file" name="picture" value="{{$data->picture}}" class="form-control" >
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Chú thích</div></span>
         <textarea class='ckeditor' name="note" class="form-control" required="">{{$data->note}}</textarea>
       </div>
       <div class="input-group">
            <span class="input-group-addon " ><div class="editGroupLabel">Trạng thái</div></span>
            <input type="checkbox" name="active" @if($data->is_active==1) checked @endif class="form-control" >
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
         <input type="submit" required="" value="Cập nhật" class="form-control btn-primary" >
       </div>
   </form>
@stop