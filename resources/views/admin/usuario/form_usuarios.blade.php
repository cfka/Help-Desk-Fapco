@extends('layout.master')

@section('title','Nuevo Usuario')

@section('content')
<div class="block-header">
    <h2>
        ADMINISTRACIÓN
        <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
    </h2>
</div>

@include('messages.validacion')
@include('messages.men_exitoso')
@include('messages.men_fallido')
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
                                <input type="text" class="form-control" name="document">
                                <label class="form-label">CÉDULA</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="first_name">
                                <label class="form-label">NOMBRES</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="last_name">
                                <label class="form-label">APELLIDOS</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email">
                                <label class="form-label">CORREO</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password">
                                <label class="form-label">CONTRASEÑA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="position">
                                <label class="form-label">CARGO</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row clearfix">

                    <div class="col-sm-4">
                        <select class="form-control show-tick" name="company_id" id="company_id"
                            data-live-search="true">
                            <option value="">EMPRESA</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <select class="form-control show-tick" name="type" id="user_type">
                            <option value="">TIPO DE USUARIO</option>
                            <option value="USER">USUARIO</option>
                            <option value="OPER">OPERADOR</option>
                            <option value="TECH">TÉCNICO</option>
                            <option value="ADMIN">ADMINISTRADOR</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <select class="form-control show-tick" name="priority" id="priority">
                            <option value="">NIVEL DE PRIORIDAD</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            {{-- <option value="4">4</option>
                            <option value="5">5</option> --}}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- #END# Input -->
<!-- Checkbox -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card" id="card22">
            <div class="header">
                <h2>
                    ASIGNAR EMPRESA
                </h2>
            </div>
            <div class="body">

                @if(count($companies_dis))
                <h2 class="card-inside-title">Empresas sin Técnico Asignado</h2>
                @for($i=0; $i < count($companies_dis); $i++) <label for="{{$companies_dis[$i]->id}}"> -
                    {{$companies_dis[$i]->name}}</label>
                    @endfor

                    <h2 class="card-inside-title">Seleccione</h2>
                    <div class="demo-checkbox">
                        @for($i=0; $i
                        < count($companies); $i++) <input type="checkbox" value="{{$companies[$i]->id}}"
                            id="{{$companies[$i]->id}}" name="companies[]" class="filled-in chk-col-blue" />
                        <label for="{{$companies[$i]->id}}"> {{$companies[$i]->name}}</label>
                        @endfor
                    </div>
                    @else
                    <h2 class="card-inside-title">Todas las empresas tienen técnico asignado</h2>
                    @endif
                    <h2 class="card-inside-title"></h2>

            </div>
        </div>
    </div>
</div>

<!-- #END# Checkbox -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">

                    <div class="col-sm-10">

                        <a href="{{asset('/users/')}}" class="btn btn-success waves-effect" type="sumit">
                            <i class="material-icons"></i>Volver
                            Atrás</a>
                    </div>

                    <div class="col-sm-1">
                        <button class="btn btn-primary waves-effect" type="submit" name="boton"
                            value="Guardar">GUARDAR</button>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}


@endsection
@section('scripts')
{!!Html::script('js/selectdepart.js')!!}
{!!Html::script('js/admin/company_techn.js')!!}

@endsection