@extends('eco::layout.main')
@section('title')
Cập nhật công việc
@stop
@section('content')
    @if(isset($works))
        @foreach($works as $value)
            <div class="input-group">
                <span class="input-group-btn " >
                    <a href="{{asset('')}}prw/list-join/{{$value->id}}" class="btn btn-warning"><span class="glyphicon glyphicon-th-list"></span> Xin</a>
                    <a href="{{asset('')}}prw/list-joined/{{$value->id}}" class="btn btn-success"><span class="glyphicon glyphicon-th-list"></span>  Đã duyệt</a>
                </span>
              <input type="text" name="workName" readonly required="" value="{{$value->workName}}" class="form-control">
            </div>
        @endforeach
        @else
            Hiện tại dữ liệu trống.
        @endif
@endsection