<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-Sequiv="X-UA-Compatible" content="IE=edge">
    <title>SISWEBCAFE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
{{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
<!-- Font Awesome -->
{{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}
<!-- Ionicons -->
{{ Html::style('bower_components/Ionicons/css/ionicons.min.css') }}
<!-- Theme style -->
{{ Html::style('dist/css/AdminLTE.min.css') }}

<!-- iCheck -->
    {{--<link rel="stylesheet" href="plugins/iCheck/square/blue.css">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="dist/js/html5shiv.min.js"></script>
    <script src="dist/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page" style="background: url(img/fondo.jpg) no-repeat 0px 0px; background-size: cover; height: auto;">

    <div class="login-box">
        <div class="login-box-body" style="border: #e4e4e4 solid 1px;">
            @include('partials.messageindex')
            <p class="login-box-msg" style="font-size: 25px;color: #00a65a;"><b>Iniciar sesión</b></p>

            {!! Form::open(array('url' => 'login', 'method' => 'POST')) !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="row">
                <div class="col-xs-8">
					<a href="{{ route('recuperarpassword') }}">¿Olvidaste tu contraseña?</a>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Iniciar</button>
                </div><!-- /.col -->
                <div class="col-xs-10 col-xs-offset-1">
                    <br>
                </div><!-- /.col -->
            </div>
            {!! Form::close() !!}

	

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


<!-- jQuery 2.1.4 -->
{{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
<!-- Bootstrap 3.3.5 -->
{{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}

</body>
</html>
