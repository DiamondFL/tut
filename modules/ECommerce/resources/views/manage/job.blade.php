@extends('eco::layout.main')
@section('title')
Xử lý xin việc
@endsection
@section('content')
    @if(isset($work))
    @foreach($work as $value)
        <div class="input-group">
            <span class="input-group-btn " >
                <a href="{{asset('')}}wk/delete-work/{{$value->id}}" class="btn-danger btn">Xóa</a>
                <a href="{{asset('')}}wk/update-work/{{$value->id}}" class="btn btn-warning">Sửa</a>
            </span>
          <input type="text" name="workName" readonly required="" value="{{$value->workName}}" class="form-control">
        </div>
    @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
@endsection
