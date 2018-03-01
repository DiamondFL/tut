<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Edubeanz" />
    <meta name="author" content="" />
    <link rel="icon" href="{{asset('')}}assets/images/favicon.ico">
    <title>Edubeanz | Register</title>
    <link rel="stylesheet" href="{{asset('')}}assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-core.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-theme.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/custom.css">
    <script src="{{asset('')}}assets/js/jquery-1.11.3.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .BDC_CaptchaDiv, .BDC_CaptchaIconsDiv, .BDC_ReloadLink, .BDC_SoundLink{
            display: inline!important;
        }
    </style>
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">
<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
    var baseurl = '';
</script>
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a href="/" class="logo">
                    <h1 style="color: white">EDUBEANZ</h1>
                </a>
                {{--<p class="description">Dear user, log in to access the admin area!</p>--}}
            </div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <form role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-user"></i>
                            </div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                                   autofocus>
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
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Bottom scripts (common) -->
<script src="{{asset('')}}assets/js/gsap/TweenMax.min.js"></script>
<script src="{{asset('')}}assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="{{asset('')}}assets/js/bootstrap.js"></script>
<script src="{{asset('')}}assets/js/joinable.js"></script>
<script src="{{asset('')}}assets/js/resizeable.js"></script>
<script src="{{asset('')}}assets/js/neon-api.js"></script>
<script src="{{asset('')}}assets/js/jquery.validate.min.js"></script>
<script src="{{asset('')}}assets/js/neon-login.js"></script>

<!-- JavaScripts initializations and stuff -->
{{--<script src="{{asset('')}}assets/js/neon-custom.js"></script>--}}

<!-- Demo Settings -->
{{--<script src="{{asset('')}}assets/js/neon-demo.js"></script>--}}

</body>
</html>