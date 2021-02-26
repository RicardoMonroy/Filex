<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Filex | Login</title> <!-- TODO: Modificar etiquetas Meta de la app -->

        <meta name="description" content="Aplicación Filex, firma de contratos digitales">
        <meta name="author" content="Tooring">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon57.png') }}" sizes="57x57">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon72.png') }}" sizes="72x72">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon76.png') }}" sizes="76x76">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon114.png') }}" sizes="114x114">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon120.png') }}" sizes="120x120">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon144.png') }}" sizes="144x144">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon152.png') }}" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">

        <!-- Related styles of various icon packs and javascript plugins -->
        <link rel="stylesheet" href="{{ asset('backend/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('backend/css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="{{ asset('backend/js/vendor/modernizr-respond.min.js') }}"></script>

        <!-- Font Awesome -->
        <link href="{{ asset('backend/css/fonts/fontawesome/css/all.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <body>
        <!-- Header -->
        <header class="navbar navbar-default navbar-fixed-top">
            <!-- Header Brand -->
            <a href="{{ route('welcome')}}" class="navbar-brand">
                <img src="{{ asset('backend/img/template/brand.png') }}" alt="FreshUI">
                <span>Filex</span>
            </a>
            <!-- END Header Brand -->
        </header>
        <!-- END Header -->

        <!-- Login Container -->
        <div id="login-container">
            <!-- Page Content -->
            <div id="page-content" class="block remove-margin">
                <!-- Login Title -->
                <div class="block-header">
                    <div class="header-section">
                        <h1 class="text-center">Bienvenido a Filex<br><small>Por favor ingresa tus datos de sesión</small></h1>
                    </div>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" id="form-login" class="form-horizontal">
                    @csrf
                    {{-- <div class="form-group">
                        <!-- Social Login -->
                        <div class="col-xs-6">
                            <a href="javascript:void(0)" class="btn btn-lg btn-info btn-block"><i class="fa fa-facebook"></i> Facebook</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="javascript:void(0)" class="btn btn-lg btn-info btn-block"><i class="fa fa-twitter"></i> Twitter</a>
                        </div>
                        <!-- END Social Login -->
                    </div> --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            {{-- <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email"> --}}
                            <input id="login-email" type="email" class="form-control @error('email') is-invalid @enderror input-lg" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            {{-- <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password"> --}}
                            <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror input-lg" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <!--
                            Hidden checkbox. Its checked property will be toggled every time the remember me (#btn-remember) button is clicked (js code at the bottom)
                            You can add the checked property by default (the button will be enabled automatically)
                            -->
                            <input type="checkbox" id="login-remember" name="login-remember" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="btn-group">
                                {{-- <button type="button" class="btn btn-sm btn-default disabled">Remember me?</button>
                                <button type="button" class="btn btn-sm btn-default" data-toggle="button" id="btn-remember"><i class="fa fa-check"></i></button> --}}
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordarme') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            {{-- <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login</button> --}}
                            <button type="submit" class="btn btn-rounded btn-sm btn-blue"><i class="fa fa-angle-right"></i>{{ __('Login') }}</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            @if (Route::has('password.request'))
                            <p class="text-center remove-margin"><small>Olvidaste tu password?</small> <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Resetealo aquí') }}</a></p>

                            @endif
                        </div>
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>No tienes cuenta?</small> <a href="javascript:void(0)" id="link-login"><small>Crea una aqui!</small></a></p>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Register Form -->
                {{-- <form action="page_special_login.html" method="post" id="form-register" class="form-horizontal display-none" onsubmit="return false;"> --}}
                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                <!-- END Register Form -->

                <!-- Modal Terms -->
                <div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Terms &amp; Conditions</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Modal Terms -->
            </div>
            <!-- END Page Content -->
        </div>
        <!-- END Login Container -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and custom Javascript code -->
        <script src="backend/js/vendor/bootstrap.min.js"></script>
        <script src="backend/js/plugins.js"></script>
        <script src="backend/js/main.js"></script>

        <!-- Javascript code only for this page -->
        <script>
            $(function () {
                /* Save buttons (remember me and terms) and hidden checkboxes in variables */
                var checkR = $('#login-remember'),
                    checkT = $('#register-terms'),
                    btnR = $('#btn-remember'),
                    btnT = $('#btn-terms');

                // Add the 'active' class to button if their checkbox has the property 'checked'
                if (checkR.prop('checked'))
                    btnR.addClass('active');
                if (checkT.prop('checked'))
                    btnT.addClass('active');

                // Toggle 'checked' property of hidden checkboxes when buttons are clicked
                btnR.on('click', function () {
                    checkR.prop('checked', !checkR.prop('checked'));
                });
                btnT.on('click', function () {
                    checkT.prop('checked', !checkT.prop('checked'));
                });

                /* Login & Register show-hide */
                var formLogin = $('#form-login'),
                    formRegister = $('#form-register');

                $('#link-login').click(function () {
                    formLogin.slideUp(250);
                    formRegister.slideDown(250);
                });
                $('#link-register').click(function () {
                    formRegister.slideUp(250);
                    formLogin.slideDown(250);
                });
            });
        </script>
    </body>
</html>


{{-- @extends('layouts.app')

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
@endsection --}}
