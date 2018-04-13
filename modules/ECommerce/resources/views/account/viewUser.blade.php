@extends('layout.main')
@section('title')
Thêm công việc
@endsection
@section('content')
<div class="container  col-md-12 ">
    <h2 class="form-signin-heading center">Thông tin tài khoản</h2>
    @foreach($user as $value)
    <form method="post" action="{{asset('')}}us/update-user">
        <input type="hidden" name="userId" value="{{$value->id}}">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Họ và tên</div></span>
          <input type="text" class="form-control"  readonly value="{{$value->fullname}}" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Số điện thoại</div></span>
          <input type="email" class="form-control" readonly value="{{$value->phone}}" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Email</div></span>
          <input type="email" class="form-control" readonly value="{{$value->email}}" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Địa chỉ</div></span>
          <input type="email" class="form-control" readonly value="{{$value->address}}" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Trạng thái</div></span>
          <input type="checkbox" name="active" class="form-control" @if($value->active==1) checked @endif  aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Quyền Admin</div></span>
          <input type="checkbox" name="admin" class="form-control"  @if($value->level==1) checked @endif aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Thời gian đăng ký</div></span>
          <input type="input" class="form-control" value="{{$value->created_at}}" readonly aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Thời gian cập nhật</div></span>
          <input type="input" class="form-control" value="{{$value->updated_at}}" readonly aria-describedby="basic-addon1">
        </div>
         <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><div style="width: 200px">Cập nhật</div></span>
            <button type="submit" class="btn btn-block btn-primary">Cập nhật</button>
        </div>
    </form>
    @endforeach
</div> <!-- /container -->
@endsection