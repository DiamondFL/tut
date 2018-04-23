@extends('eco::layout.main')
@section('title')
Lấy lại mật khẩu
@endsection
@section('content')
    <div class="container well col-md-4 col-md-offset-4">
        <h4>Vui lòng điền địa chỉ email:</h4>
        <form action="{{URL::route('password.request-post')}}" method="post">
            <div class="input-group">
              <input type="email.." class="form-control" placeholder="Email..." name="email" {{(Input::old('email'))?'value="'.e(Input::old('email')).'"':''}}>
              <span class="input-group-btn">
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>
              </span>
              @if($errors->has('email'))
                  {{$errors->first('email')}}
              @endif
            </div><!-- /input-group -->
            {{Form::token()}}
        </form>
    </div>
@endsection