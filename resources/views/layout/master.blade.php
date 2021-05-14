<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">



    <!-- Bootstrap Core Css -->
    {!! Html::style('plugins/bootstrap/css/bootstrap.css')!!}

    <!-- Waves Effect Css -->
    {!! Html::style('plugins/node-waves/waves.css')!!}

    <!-- Animation Css -->
    {!! Html::style('plugins/animate-css/animate.css')!!}

    <!-- Morris Css -->
    {!! Html::style('plugins/morrisjs/morris.css') !!}

    <!-- Custom Css -->
    {!! Html::style('css/style.css')!!}

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    {!! Html::style('css/themes/theme-blue.css')!!}

    <!-- Multi Select Css -->
    {!! html::style('plugins/multi-select/css/multi-select.css') !!}

    <!-- Bootstrap Select Css -->
    {!! Html::style('plugins/bootstrap-select/css/bootstrap-select.css')!!}

    <!-- Wait Me Css -->
    {!! Html::style('plugins/waitme/waitMe.css')!!}

    <!-- Colorpicker Css -->
    {!! Html::style('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') !!}

    <!-- Dropzone Css -->
    {!! Html::style('plugins/dropzone/dropzone.css') !!}

    <!-- Bootstrap Spinner Css -->
    {!! Html::style('plugins/jquery-spinner/css/bootstrap-spinner.css') !!}

    <!-- Bootstrap Tagsinput Css -->
    {!! Html::style('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}

    <!-- noUISlider Css -->
    {!! Html::style('plugins/nouislider/nouislider.min.css') !!}
    <!-- JQuery DataTable Css -->
    {!! Html::style('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') !!}

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    {!! Html::style('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {!! Html::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') !!}


</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere un momento.</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{asset('/userhome')}}"> HELPDESK - GRUPO FAPCO</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->

        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('/images')}}/user.png" width="48" height="48" alt="User" />
                </div>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!!Auth::user()->first_name!!}</div>
                    <div class="email">{!!Auth::user()->email!!}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{asset('/logout')}}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            @if (Auth::user()->type ==='USER')
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU PRINCIPAL</li>
                    <li class="active">
                        <a href="{{asset('/userhome')}}">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
            @if(Auth::user()->type !=='USER')
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU PRINCIPAL</li>
                    <li class="active">
                        <a href="{{asset('/userhome')}}">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li>


                    {{-- <li class="">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">settings</i>
                                <span>SOPORTE</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{asset('/tickets')}}">TICKETS</a>
                    </li>
                    <li>
                        <a href="{{asset('/planning')}}">PLANIFICACIÓN</a>
                    </li>
                </ul>
                </li> --}}
                <li class="">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">phonelink</i>
                        <span>INVENTARIO</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{asset('/assets')}}">ACTIVOS</a>
                        </li>
                        <li>
                            <a href="{{asset('/consumables')}}">CONSUMIBLES</a>
                        </li>
                        <li>
                            <a href="{{asset('/software')}}">SOFTWARE</a>
                        </li>
                        <li>
                            <a href="{{asset('/brand')}}">MARCA</a>
                        </li>
                        <li>
                            <a href="{{asset('/assetsType')}}">TIPO DE EQUIPO</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">content_copy</i>
                        <span>ADMINISTRACIÓN</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{asset('/company')}}">EMPRESAS</a>
                        </li>
                        <li>
                            <a href="{{asset('/cecos')}}">CENTROS DE COSTOS</a>
                        </li>
                        <li>
                            <a href="{{asset('/department')}}">DEPARTAMENTOS</a>
                        </li>
                        <li>
                            <a href="{{asset('/supplier')}}">PROVEEDORES</a>
                        </li>
                        {{-- <li>
                                    <a href="{{asset('/services')}}">SERVICIOS</a>
                </li> --}}


                </ul>
                </li>
                <li class="">
                    <a href="{{asset('/reports')}}">
                        <i class="material-icons">insert_drive_file</i>
                        <span>REPORTES</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{asset('/users')}}">
                        <i class="material-icons">person</i>
                        <span>USUARIOS</span>
                    </a>
                </li>
                </ul>
            </div>
            @endif

            <!-- #Menu -->
            <!-- Footer -->
            {{-- <div class="legal">
                <div class="copyright">
                    &copy; Grupo FAPCO 2018 <a href="javascript:void(0);">HELPDESK</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div> --}}
            <!-- #Footer -->
        </aside>
    </section>


    <section class="content">
        <div class="container-fluid">

            @yield('content')
        </div>
    </section>



    <!-- Jquery Core Js -->
    {!!Html::script ('plugins/jquery/jquery.min.js')!!}
    <!-- Bootstrap Core Js -->
    {!!Html::script ('plugins/bootstrap/js/bootstrap.js')!!}

    <!-- Select Plugin Js -->
    {!!Html::script('plugins/bootstrap-select/js/bootstrap-select.js')!!}

    <!-- Slimscroll Plugin Js -->
    {!!Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js')!!}

    <!-- Waves Effect Plugin Js -->
    {!!Html::script('plugins/node-waves/waves.js')!!}

    <!-- Custom Js -->
    {!!Html::script('js/admin.js')!!}
    {!!Html::script('js/pages/forms/basic-form-elements.js')!!}

    <!-- Demo Js -->
    {!!Html::script('js/demo.js')!!}

    <!-- Autosize Plugin Js -->
    {!!Html::script('plugins/autosize/autosize.js')!!}

    <!-- Moment Plugin Js -->
    {!!Html::script('plugins/momentjs/moment.js')!!}

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    {!!Html::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')!!}

    @yield('scripts')


</body>

</html>