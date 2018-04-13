@extends('auth.layout')
@section('container')
    <div class="login-form">
        <div class="login-content">
            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
            </div>
            <form role="form" method="POST" action="{{ route('login') }}" id="form_login">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Login In
                    </button>
                </div>
                <!-- Implemented in v1.1.4 -->
                <div class="form-group">
                    <em>- or -</em>
                </div>
                <div class="form-group">
                    <a href="{{asset('register')}}" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-register"></i>
                        Register
                    </a>
                </div>
                {{--<div class="form-group">--}}
                {{--<a href="{{url('/redirect/facebook')}}"--}}
                {{--class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">--}}
                {{--Login with Facebook--}}
                {{--<i class="entypo-facebook"></i>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--<a href="{{url('/redirect/facebook')}}"--}}
                {{--class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">--}}
                {{--Login with Facebook--}}
                {{--<i class="entypo-facebook"></i>--}}
                {{--</a>--}}
                {{--</div>--}}
            </form>
            <div class="login-bottom-links">
                <a href="{{ route('password.request') }}"class="link">Forgot your password?</a>
                <br />
                <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
@endsection