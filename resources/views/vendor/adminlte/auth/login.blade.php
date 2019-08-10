@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Inicio de sesión
@endsection

@section('content')
 <style>
        body, html {
            height: 100%;
        }
        .bg {
            /* The image used */
            /*background-image: url("img/imagenNatural3.jpg");*/
            background-image: url("img/fondoVirus.png");

            /* Full height */
            height: 100%;
            max-width: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }
    </style>

    <body class="hold-transition login-page bg">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <h1 class="label label-danger"><b>D'rocha </b>S.A</h1>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <p class="login-box-msg"> Iniciar sesion para comenzar </p>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember">  Recuerdame
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-danger btn-block btn-flat">Iniciar</button>
                </div><!-- /.col -->
            </div>
        </form>


        <a href="{{ url('/password/reset') }}">He olvidado mi contraseña</a><br>
        <a href="{{ url('/register') }}" class="text-center">Registrame</a>

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
