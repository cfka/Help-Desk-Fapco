@extends('layout.master')

@section('title','Usuario')

@section('content')
    <div class="block-header">
        <h2>
            ADMINISTRACIÓN
            <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>

    @include('messages.validacion')

    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        NUEVO USUARIO
                        <small>Administración</small>
                    </h2>
                </div>
                <div class="body">


                    {!!Form::open(['route'=>'users.store','method'=>'POST'])!!}



                        <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="document"  >
                                            <label class="form-label">CÉDULA</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="first_name" >
                                            <label class="form-label">NOMBRES</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="last_name" >
                                            <label class="form-label">APELLIDOS</label>
                                        </div>

                                    </div>
                                </div>
                        </div>
                        <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="email" class="form-control" name="email" >
                                                <label class="form-label">CORREO</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="position">
                                                <label class="form-label">CARGO</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control show-tick" name="department_id">
                                            <option value="">-- Please select --</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="row clearfix">
                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="type">
                                        <option value="">-- Please select --</option>
                                        <option value="ADMIN">ADMINISTRADOR</option>
                                        <option value="USER">USUARIO</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" >
                                            <label class="form-label">CONTRASEÑA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="url" class="form-control" name="avatar">
                                            <label class="form-label">AVATAR</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">GUARDAR</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    <!-- #END# Input -->

@endsection
@section('scripts')

    <!-- Slimscroll Plugin Js -->
    {!!Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js') !!}

    <!-- Waves Effect Plugin Js -->
    {!!Html::script('plugins/node-waves/waves.js') !!}

    <!-- Autosize Plugin Js -->
    {!!Html::script('plugins/autosize/autosize.js') !!}

    <!-- Moment Plugin Js -->
    {!!Html::script('plugins/momentjs/moment.js') !!}

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    {!!Html::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}

    <!-- Custom Js -->
    {!!Html::script('js/admin.js') !!}
    {!!Html::script('js/pages/forms/basic-form-elements.js') !!}

    <!-- Demo Js -->
    {!!Html::script('js/demo.js') !!}



@endsection