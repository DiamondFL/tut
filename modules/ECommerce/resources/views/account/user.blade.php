@extends('...layout.main')
@section('title')
Tài khoản
@endsection
@section('content')
    @if(isset($users))
    @foreach($users as $value)
        <div class="input-group">
            <span class="input-group-btn " >
                <a href="{{asset('')}}us/delete-user/{{$value->id}}" class="btn-danger btn"><span class="glyphicon glyphicon-trash"></span></a>
                <a href="{{asset('')}}us/view-user/{{$value->id}}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></a>
            </span>
          <input type="text" name="workName" readonly required="" value="{{$value->email}}" class="form-control">
        </div>
    @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
@endsection
