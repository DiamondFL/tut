@extends('eco::layout.main')
@section('title')
Cập nhật công việc
@stop
@section('content')
    <form method="post" >
        <input type="hidden" name="id" value="{{$id}}">
        <div class="input-group">
          <span class="input-group-addon " ><div class="editGroupLabel">Tên công việc</div></span>
          <input type="text" name="workName" required="" value = "{{$workName}}" class="form-control">
        </div>
        <div class="input-group">
          <span class="input-group-addon " ><div class="editGroupLabel">Ngày bắt đầu</div></span>
          <input type="datetime" name="startDate" required=""  value = "{{$startDate}}" class="form-control" >
        </div>
        <div class="input-group">
          <span class="input-group-addon " ><div class="editGroupLabel">Số ngày thực hiện</div></span>
          <input type="number" required=""  name="numberDay" value = "{{$numberDay}}" class="form-control" >
        </div>
        <div class="input-group">
          <span class="input-group-addon " ><div class="editGroupLabel">Chi tiết công việc</div></span>
          <textarea class='ckeditor' name="Note" class="form-control" required="">{{$Note}}</textarea>
        </div>
        <div class="input-group">
          <span class="input-group-addon " ><div class="editGroupLabel">Phần thưởng</div></span>
          <input type="number" required="" name="price" value = "{{$price}}" class="form-control" >
        </div>
        <div class="input-group">
          <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
          <input type="submit" required="" class="form-control btn-primary" >
        </div>
    </form>
@endsection