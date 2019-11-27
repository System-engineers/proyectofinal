<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicio Sesion | Proyecto - Backend</title>
    <!-- Favicon-->
    <link rel="icon" href='{{url("/plantilla")}}/images/favicon.ico' type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ URL::asset('plantilla/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('plantilla/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ URL::asset('plantilla/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ URL::asset('plantilla/css/style.css') }}" rel="stylesheet">

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Proyecto<b>BK</b></a>
            <small>Proyecto - Backend - Laravel</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Inicia sesión para ingresar</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line{{ $errors->has('email') ? 'error' : '' }}">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu correo" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <label id="email-error" class="error" for="email">
                                {{$errors->first('email')}}
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line{{ $errors->has('password') ? 'error' : '' }}">
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                            @if ($errors->has('password'))
                            <label id="password-error" class="error" for="password">
                                {{$errors->first('password')}}
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 text-center">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">INGRESAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ URL::asset('plantilla/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ URL::asset('plantilla/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ URL::asset('plantilla/plugins/node-waves/waves.js') }}"></script>
    
    <!-- Validation Plugin Js -->
    <script src="{{URL::asset('plantilla/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('plantilla/js/admin.js') }}"></script>
    <script src="{{ URL::asset('plantilla/js/pages/examples/sign-in.js') }}"></script>
    
</body>

</html>