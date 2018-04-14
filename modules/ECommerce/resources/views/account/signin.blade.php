@extends('eco::layout.main')
@section('title')
WorkShop|| Đăng nhập
@endsection
@section('content')
    <div class="container well col-md-4 col-md-offset-4">
          <form class="form-signin" action="{{URL::route('account-sign-in-post')}}" method="post">
            <h2 class="form-signin-heading center">Vui lòng đăng nhập</h2>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Địa chỉ email..." required autofocus>
                @if($errors->has('email'))
                    {{$errors->first('email')}}
                @endif
            <input type="password" id="inputPassword" name ="password" class="form-control" placeholder="Mật khẩu" required>
                 @if($errors->has('password'))
                    {{$errors->first('password')}}
                 @endif
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" id="remember">Nhớ tài khoản
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
             {{Form::token()}}
          </form>
    </div> <!-- /container -->
@endsection