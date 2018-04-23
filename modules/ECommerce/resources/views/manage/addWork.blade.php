@extends('eco::layout.main')
@section('title')
Thêm công việc
@stop
@section('content')
   <form method="post">
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Tên công việc</div></span>
             <input type="text" name="workName" required="" class="form-control">
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Ngày bắt đầu</div></span>
             <input type="datetime" name="startDate" required=""  class="form-control" >
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Số ngày thực hiện</div></span>
             <input type="number" required=""  name="numberDay" class="form-control" >
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Chi tiết công việc</div></span>
             <textarea class='ckeditor' name="Note" class="form-control" required=""></textarea>
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Phần thưởng</div></span>
             <input type="number" required="" name="price" class="form-control" >
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
             <input type="submit" required=""   class="form-control btn-primary" >
           </div>
       </form>
@stop
