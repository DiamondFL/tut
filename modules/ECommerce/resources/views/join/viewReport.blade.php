@extends('eco::layout.main')
@section('title')
Xem báo cáo
@stop
@section('content')
   <form method="post">
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Tên công việc</div></span>

         <input  readonly value="{{Works::where('id',Jobs::where('id',$data->id)->pluck('work_id'))->pluck('workName')}}"
                          required=""  class="form-control" >
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Tiến độ hoàn thành</div></span>
         <input readonly type="number" name="progress" required=""  value="{{$data->progress}}" class="form-control" >
       </div>
       <div class="input-group">
         <span class="input-group-addon " ><div class="editGroupLabel">Chi tiết</div></span>
         <textarea readonly   class="form-control" required="">{{$data->details}}</textarea>
       </div>

   </form>
@stop