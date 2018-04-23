@extends('eco::layout.main')
@section('title')
Công việc đã nhận
@stop
@section('content')
@if(isset($list))
       @foreach($list as $value)
           <div class="input-group">
               <span class="input-group-btn " >
                   <a href="{{asset('')}}prw/cancel-joined/{{$id}}/{{$value->id}}" class="btn-warning btn">Hủy nhận</a>
               </span>
             <input type="text" name="workName" readonly required="" value="{{User::where('id',$value->user_id)->pluck('username')}}" class="form-control">
           </div>
       @endforeach
       @else
           Hiện tại dữ liệu trống.
       @endif
@endsection