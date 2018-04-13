@extends('layout.main')
@section('title')
Thay đổi mật khẩu
@endsection
@section('content')
    <div class="container well col-md-4 col-md-offset-4">
        <h2>Thay đổi mật khẩu</h2>
        <form action="{{URL::route('account-change-password-post')}}" method="post">
                <input type="password" class="form-control" name="oldPassword" placeholder="Mật khẩu cũ ...">
                @if($errors->has('oldPassword'))
                    {{$errors->first('oldPassword')}}
                @endif
            <div class="field">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới ...">
                @if($errors->has('password'))
                    {{$errors->first('password')}}
                @endif
            </div>
            <div class="field">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Lại mật khẩu mới ...">
                @if($errors->has('password_confirmation'))
                    {{$errors->first('password_confirmation')}}
                @endif
            </div>
            <input type="submit" class="btn btn-danger btn-block" value="Change password">
            {{Form::token()}}
        </form>
    </div>
@endsection