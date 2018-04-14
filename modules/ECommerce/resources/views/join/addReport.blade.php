@extends('eco::layout.main')
@section('title')
Thêm báo cáo
@stop
@section('content')
   @if($count == 0 )
        Bạn không có công việc nào để báo cáo
   @else
   <form method="post">
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Tên công việc</div></span>
             <select readonly name="jobs_id" class="form-control" >
                @foreach($work as $value)
                <option value="{{$value->id}}">{{Works::where('id',Jobs::where('id',$value->$data->id)->pluck('work_id'))->pluck('workName')}}</option>
                @endforeach
             </select>
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Tiến độ hoàn thành</div></span>
             <input type="number"  readonly  name="progress" required=""  class="form-control" >
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel">Chi tiết</div></span>
             <textarea class='ckeditor'  readonly  name="details" class="form-control" required=""></textarea>
           </div>
           <div class="input-group">
             <span class="input-group-addon " ><div class="editGroupLabel"></div></span>
             <input type="submit" required=""  value="Báo cáo" class="form-control btn-primary" >
           </div>
       </form>
   @endif
@stop