<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>HELPDESK</title>
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
    <div class="image align-center">
        <img src="{{asset('/images')}}/logo.png" width="200" height="150" alt="User" />
    </div>
    <div class="logo" >
        <h4 class="font-bold col-white align-center">Estimado Usuario</h4>
        <h4 class="font-bold col-white align-center">Usted ya emitió su opinión sobre la atención recibida a este caso</h4>
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