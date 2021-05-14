<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | HELPDESK</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    {!! Html::style('plugins/bootstrap/css/bootstrap.css') !!}

    <!-- Waves Effect Css -->
    {!! Html::style('plugins/node-waves/waves.css') !!}

    <!-- Animation Css -->
    {!! Html::style('plugins/animate-css/animate.css') !!}

    <!-- Custom Css -->
    {!! Html::style('css/style.css') !!}
</head>


@if (session()->has('flash'))
    <div class="alert alert-info">{{session('flash')}}</div>
@endif

<body class="login-page">
    <div class="login-box">

        <div class="logo">
            <a href="javascript:void(0);">FAPCO<b></b></a>
            <small> </small>
        </div>
        <div class="card">
            <div class="body">

                {!!Form::open(['route'=>'login.store', 'method'=> 'POST'])!!}

                    @csrf
                    <div class="msg">Iniciar sesión</div>
                    <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email"  placeholder="Email"  autofocus value="{{old('email')}}" >
                        </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                    </div>
                    <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" >
                        </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                </span>
                            @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-block btn- btn-primary waves-effect"  type="submit">Iniciar</button>
                        </div>
                    </div>
            </div>
                {!! Form::close() !!}
            </div>

    </div>

    <!-- Jquery Core Js -->
    {!! Html::script('plugins/jquery/jquery.min.js') !!}

    <!-- Bootstrap Core Js -->
    {!! Html::script('plugins/bootstrap/js/bootstrap.js') !!}

    <!-- Waves Effect Plugin Js -->
    {!! Html::script('plugins/node-waves/waves.js') !!}

    <!-- Validation Plugin Js -->
    {!! Html::script('plugins/jquery-validation/jquery.validate.js') !!}

    <!-- Custom Js -->
    {!! Html::script('js/admin.js') !!}
    {!! Html::script('js/pages/examples/sign-in.js') !!}
</body>

</html>