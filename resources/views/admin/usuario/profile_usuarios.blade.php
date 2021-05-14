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

    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        USUARIO
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="document" disabled="disabled" value="{{$user->document}}">
                                    <label class="form-label">CÉDULA</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="first_name" disabled="disabled" value="{{$user->first_name}}">
                                        <label class="form-label">APELLIDOS</label>
                                    </div>

                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="last_name" disabled="disabled" value="{{$user->last_name}}">
                                    <label class="form-label">APELLIDOS</label>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" disabled="disabled" value="{{$user->email}}">
                                        <label class="form-label">CORREO</label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="position" disabled="disabled" value="{{$user->position}}">
                                        <label class="form-label">CARGO</label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">


                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                <label for="company">EMPRESA</label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="company_id" id="company_id" disabled="disabled" value="{{$company->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="type" value="{{$user->type}}">
                                        <label class="form-label">TIPO DE USUARIO</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #END# Input -->
    @if( $user->type === 'ADMIN' )
        <!-- Checkbox -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id ="card22">
                    <div class="header">
                        <h2>
                            EMPRESA ASIGNADA
                        </h2>
                    </div>
                    <div class="body">
                        <h2 class="card-inside-title">Empresas</h2>
                        <div class="demo-checkbox">
                            @foreach($companies as $company)
                                @foreach($tec_comps as $tec_comp)
                                    @if($company->id === $tec_comp->company_id)
                                        <input type="checkbox" value="{{$company->id}}" id="{{$company->id}}" CHECKED name="companies[]" class="filled-in chk-col-blue" />
                                        <label for="{{$company->id}}"> {{$company->name}}</label>
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- #END# Checkbox -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="body">
                    <div class="icon-button-demo">
                        <a href="{{asset('/retorn/')}}"  class="btn bg-blue waves-effect" type="sumit">
                            <i class="material-icons"></i>VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')


@endsection

