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
@include('messages.men_exitoso')
@include('messages.men_fallido')
<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    EDITAR USUARIO
                    <small>Administración</small>
                </h2>
            </div>
            <div class="body">
                {!! Form::open(['route' => ['users.update', $users->id], 'method' => 'PUT']) !!}
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="document" value="{{$users->document}}">
                                <label class="form-label">CÉDULA</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="first_name"
                                    value="{{$users->first_name}}">
                                <label class="form-label">NOMBRES</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="last_name" value="{{$users->last_name}}">
                                <label class="form-label">APELLIDOS</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="{{$users->email}}">
                                <label class="form-label">CORREO</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" value="">
                                <label class="form-label">CONTRASEÑA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="position" value="{{$users->position}}">
                                <label class="form-label">CARGO</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row clearfix">

                    @if($users->type === "ADMIN")
                    @php
                    $tipo= "ADMINISTRADOR";
                    $tipoid="ADMIN";
                    @endphp
                    @else
                    @php
                    $tipo= "USUARIO";
                    $tipoid="USER";
                    @endphp
                    @endif
                    @if($users->gender === 1)
                    @php
                    $sexo= "FEMENINO";
                    $sex=1;
                    @endphp
                    @else
                    @php
                    $sexo= "MASCULINO";
                    $sex=0;
                    @endphp
                    @endif
                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="company_id">
                            <option value="">EMPRESAS</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}" @if($company->id === $users->company_id) selected
                                @endif>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="type" id="user_type">
                            <option value="{{$tipoid}}">{{$tipo}}</option>
                            <option value="USER">USUARIO</option>
                            <option value="OPER">OPERADOR</option>
                            <option value="TECH">TÉCNICO</option>
                            <option value="ADMIN">ADMINISTRADOR</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="priority" required>
                            <option value="">PRIORIDAD</option>
                            <option value="1" @if($users->priority == "1") selected @endif>1</option>
                            <option value="2" @if($users->priority == "2") selected @endif>2</option>
                            <option value="3" @if($users->priority == "3") selected @endif>3</option>
                            {{-- <option value="4" @if($users->priority == "4") selected @endif>4</option>
                            <option value="5" @if($users->priority == "5") selected @endif>5</option> --}}

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
                <h2 class="card-inside-title">Empresas</h2>
                <div class="demo-checkbox">
                    @foreach($companies as $company)
                    @php
                    $check="";
                    @endphp
                    @foreach($tec_comps as $tec_comp)
                    @if($company->id === $tec_comp->company_id)
                    @php
                    $check="checked";
                    @endphp
                    @break
                    @endif
                    @endforeach
                    <input type="checkbox" value="{{$company->id}}" id="{{$company->id}}" {{$check}} name="companies[]"
                        class="filled-in chk-col-blue" />
                    <label for="{{$company->id}}"> {{$company->name}}</label>
                    @endforeach
                </div>
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
{!!Html::script('js/admin/company_techn.js')!!}

@endsection