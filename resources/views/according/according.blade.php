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

        <div class="logo" >
            <h4 class="font-bold col-white align-center">Formulario de conformidad</h4>
        </div>
        <div class="card">
            <div class="body">
                {!! Form::open(['url'=>'accordingupdate','method'=>'POST']) !!}

                    @csrf
                <input type="hidden" name="id" value="{{$id}}">
                    <div class="demo-checkbox align-center">
                        <input type="checkbox" id="md_checkbox" class="chk-col-blue" name="according" value="1"/>
                        <label  for="md_checkbox">Estoy conforme con el servicio recibido</label>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="according_reason" placeholder="En caso de no conformidad, comentarios u observaciones, explique..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-block btn- btn-primary waves-effect"  type="submit">Confirmar</button>
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