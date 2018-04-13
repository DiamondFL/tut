@extends('layout.main')
@section('content')
    <div class="container well col-md-4 col-md-offset-4">
          <form class="form-signin" action="{{URL::route('account-create-post')}}" method="post">
            <h2 class="form-signin-heading center">Vui lòng điền thông tin</h2>
            <input type="text" class="form-control" name="fullName" placeholder="Họ tên..."
                    {{(Input::old('fullName'))?' value="'.e(Input::old('fullName')).'"':''}}>
                    @if($errors->has('fullName'))
                        {{$errors->first('fullName')}}
                    @endif
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Địa chỉ email..." required autofocus>
                @if($errors->has('email'))
                    {{$errors->first('email')}}
                @endif
            <input type="password" id="inputPassword" name ="password" class="form-control" placeholder="Mật khẩu" required>
                 @if($errors->has('password'))
                    {{$errors->first('password')}}
                 @endif
            <input type="password" id="inputPassword" name ="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" required>
                 @if($errors->has('password_confirmation'))
                    {{$errors->first('password_confirmation')}}
                 @endif
            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>
             {{Form::token()}}
          </form>
    </div> <!-- /container -->
@endsection