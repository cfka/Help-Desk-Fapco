@extends('layout.master')

@section('title','TICKET')

@section('content')
    <div class="block-header">
        <h2>
            SOPORTE
            <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>

    @include('messages.validacion')
    @switch($ticket->priority)
        @case('LOW')
        @php

            $priority="BAJA";
        @endphp
        @break

        @case('MEDIUM')
        @php

            $priority="MEDIA";
        @endphp
        @break
        @case('HIGH')
        @php

            $priority="ALTA";
        @endphp
        @break
        @php

            $priority= "ERROR";
        @endphp
        @break

    @endswitch
    @switch($ticket->status)
        @case('NEW')
        @php

            $estatus="NUEVO";
        @endphp
        @break

        @case('PENDING')
        @php

            $estatus="PENDIENTE";
        @endphp
        @break
        @case('CLOSED')
        @php

            $estatus="CERRADO";
        @endphp
        @break
        @case('WORKING')
        @php
            $estatus="EN PROCESO";
        @endphp
        @break
        @case('SOLVED')
        @php
            $estatus="SOLUCIONADO";
        @endphp
        @break
        @case('BLOCKED')
        @php
            $estatus="BLOQUEADO";
        @endphp
        @break
        @php
            $estatus= "ERROR";
        @endphp
        @break

    @endswitch
    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        TICKET # {{$ticket->id}}
                    </h2>
                    <div class="row clearfix">
                        <div class="col-xs-1 pull-right">
                            {!!Form::open(['url'=>['imprimir',$ticket->id],'method'=>'GET']) !!}
                                <button class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="right" title="Generar informe de Soporte Técnico" type="submit">INFORME</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="status" value="{{$estatus}}">
                                    <label class="form-label">ESTADO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="failure_id" value="{{$failure->name}}">
                                    <label class="form-label">FALLA</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="priority" value="{{$priority}}">
                                    <label class="form-label">PRIORIDAD</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="description" value="{{$ticket->description}}">
                                    <label class="form-label">DESCRIPCIÓN</label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="asset_id" value="{{$tech}}">
                                    <label class="form-label">TÉCNICO</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="asset_id" value="{{$asset->number}}">
                                    <label class="form-label">ACTIVO</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" id="user" value="{{$user->first_name}} {{$user->last_name}}">
                                    <label class="form-label">USUARIO</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row clearfix">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card" id ="card22">
                <div class="header">
                    <h2>
                        ESTADISTICA
                    </h2>
                </div>
                <div class="body">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fecha_cambio as $fecha)
                                        <tr> <th>{{$fecha['date']}}   -----   {{$fecha['title']}}   </th></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card" id ="card22">
                <div class="header">
                    <h2>
                        TIEMPOS
                    </h2>
                </div>
                <div class="body">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fecha_cambio as $fecha)
                                    <tr> <th>{{$fecha['date']}}   -----   {{$fecha['title']}}   </th></tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Input -->

        <!-- Checkbox -->


    <!-- #END# Checkbox -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="body">
                    <div class="icon-button-demo">
                        <a href="{{asset('/retornt/')}}"  class="btn bg-blue waves-effect" type="sumit">
                            <i class="material-icons"></i>VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #END# Input -->

@endsection
@section('scripts')
    {!!Html::script('js/admin/asset_userselect.js')!!}
@endsection