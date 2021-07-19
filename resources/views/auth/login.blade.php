@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{--    <!DOCTYPE html>--}}
{{--<head>--}}
{{--    <title>Admin page</title>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--}}
{{--    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,--}}
{{--Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />--}}
{{--    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>--}}
{{--    <!-- bootstrap-css -->--}}
{{--    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >--}}
{{--    <!-- //bootstrap-css -->--}}
{{--    <!-- Custom CSS -->--}}
{{--    <link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />--}}
{{--    <link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>--}}
{{--    <!-- font CSS -->--}}
{{--    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>--}}
{{--    <!-- font-awesome icons -->--}}
{{--    <link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>--}}
{{--    <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet">--}}
{{--    <!-- //font-awesome icons -->--}}
{{--    <script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="log-w3">--}}
{{--    <div class="w3layouts-main">--}}
{{--        <h2>Sign In Now</h2>--}}
{{--        <?php--}}
{{--        $message = Session::get('message');--}}
{{--        if($message){--}}
{{--            echo '<span class="text-alert"> '.$message.'</span>';--}}
{{--            Session::put('message', null);--}}
{{--        }--}}
{{--        ?>--}}
{{--        <form action="{{route('admin.login')}}" method="post">--}}
{{--            @csrf--}}
{{--            <input type="text" class="ggg" name="email" placeholder="E-MAIL" required="">--}}
{{--            <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">--}}
{{--            <span><input type="checkbox" id="remember-me" name="remember_me"/>Remember Me</span>--}}
{{--            <h6><a href="#">Forgot Password?</a></h6>--}}
{{--            <div class="clearfix"></div>--}}
{{--            <input type="submit" value="Sign In" name="login">--}}
{{--        </form>--}}
{{--        <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script src="{{asset('backend/js/bootstrap.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/scripts.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>--}}
{{--<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->--}}
{{--<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>--}}
{{--</body>--}}
{{--</html>--}}

