<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">FAPCO<b></b></a>
            <small> </small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Iniciar sesión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect"  type="submit">Iniciar</button>
                        </div>
                    </div>
                  
                </form>
            </div>
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