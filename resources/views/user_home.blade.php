@extends('layout.master')
@section('title','Inicio')
@section('content')

@php
$tamassets = sizeof($assets);
@endphp
{{-- @if (Auth::user()->type ==='USER') --}}
<div class="block-header">
    <h2>
        INICIO
    </h2>
</div>
<!-- #END# Search Bar -->
<!-- Basic Examples -->
@include('messages.men_exitoso')
@include('messages.men_fallido')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ACTIVOS
                </h2>
            </div>
            <div class="body">
                @if($tamassets>0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>NRO</th>
                                <th>EMPRESA</th>

                                <th>NRO. ACTIVO</th>
                                <th>TIPO</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                {{-- <th>SERIAL</th> --}}
                                {{-- <th>LOCALIZACIÓN</th> --}}
                                <th>REPORTAR</th>

                            </tr>
                        </thead>
                        @php
                        $nro=0;
                        @endphp
                        <tbody>
                            @foreach($assets as $asset)
                            @if (Auth::user()->id == $asset->user_id)

                            @php
                            $nro++;
                            @endphp
                            <tr>
                                <td>{{$nro}}</td>
                                @foreach($companies as $company)
                                @if($asset->company_id == $company->id)
                                <td>{{$company->name}}</td>
                                @endif
                                @endforeach

                                <td>{{$asset ->number}}</td>
                                @foreach($assets_types as $assets_type)
                                @if($asset->assets_type_id == $assets_type->id)
                                <td>{{$assets_type->type}}</td>
                                @endif
                                @endforeach
                                @foreach($brands as $brand)
                                @if($asset->brand_id == $brand->id)
                                <td>{{$brand->name}}</td>
                                @endif
                                @endforeach
                                {{-- <td>{{$asset ->brand_id}}</td> --}}
                                <td>{{$asset ->model}}</td>
                                {{-- <td>{{$asset ->serial}}</td> --}}

                                <td>
                                    <div class="icon-button-demo">
                                        <a href="{{asset('/reportassest/')}}/{{$asset->id}}"
                                            class="btn bg-red waves-effect" type="sumit">
                                            <i class="material-icons">report</i></a>
                                    </div>

                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h2>
                    NO POSEE ACTIVOS ASOCIADOS
                </h2>
                @endif
            </div>
        </div>
    </div>

</div>
<!-- #END# Basic Examples -->


{{-- @endif --}}


@php
$tamreport = sizeof($assets);
@endphp
{{-- @if (Auth::user()->type ==='USER') --}}
<div class="block-header">

</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    REPORTES
                </h2>
            </div>
            <div class="body">
                @if($tamreport>0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>NRO</th>
                                <th>EMPRESA</th>

                                <th>NRO. ACTIVO</th>
                                <th>TIPO</th>
                                <th>MARCA</th>
                                {{-- <th>MODELO</th> --}}
                                <th>FECHA DE CREACION DE REPORTE</th>
                                <th>FECHA DE ATENCION DEL REPORTE</th>
                                {{-- <th>SERIAL</th> --}}
                                {{-- <th>LOCALIZACIÓN</th> --}}
                                <th>MODIFICAR REPORTE</th>
                                <th>ELIMINAR REPORTE</th>
                                <th>HISTORIA DEL REPORTE</th>

                            </tr>
                        </thead>
                        @php
                        $nro=0;
                        @endphp
                        <tbody>
                            @foreach($colas as $cola)
                            @foreach($assets as $asset)
                            {{-- @if (Auth::user()->id == $asset->user_id) --}}
                            @if($asset->id == $cola->id_asset)
                            @php
                            $nro++;
                            @endphp
                            <tr>
                                <td>{{$nro}}</td>
                                @foreach($companies as $company)
                                @if($asset->company_id == $company->id)
                                <td>{{$company->name}}</td>
                                @endif
                                @endforeach

                                <td>{{$asset ->number}}</td>
                                @foreach($assets_types as $assets_type)
                                @if($asset->assets_type_id == $assets_type->id)
                                <td>{{$assets_type->type}}</td>
                                @endif
                                @endforeach
                                @foreach($brands as $brand)
                                @if($asset->brand_id == $brand->id)
                                <td>{{$brand->name}}</td>
                                @endif
                                @endforeach
                                {{-- <td>{{$asset ->brand_id}}</td> --}}
                                {{-- <td>{{$asset ->model}}</td> --}}
                                {{-- <td>{{$asset ->serial}}</td> --}}

                                <td>{{$cola->created}}</td>
                                {{-- @break --}}
                                <td>{{$cola->attended}}</td>
                                <td>
                                    @if($cola->state==1)

                                    <div class="icon-button-demo">
                                        <a href="{{asset('/cola/')}}/{{$cola->id}}/edit"
                                            class="btn bg-orange waves-effect" type="sumit">
                                            <i class="material-icons">edit</i></a>
                                    </div>
                                    @endif


                                </td>
                                <td>
                                    @if($cola->state==1)

                                    <button class="btn bg-red waves-effect icon-button-demo" title="Eliminar"
                                        type="sumit" data-toggle="modal" data-target="#mdModal{{$cola->id}}">
                                        <i class="material-icons ">delete</i>
                                    </button>
                                    @endif

                                </td>
                                <td>
                                    @if($cola->state==2)
                                    <div class="icon-button-demo">
                                        <a href="{{asset('/historyreport/')}}/{{$cola->id}}"
                                            class="btn bg-purple waves-effect" type="sumit">
                                            <i class="material-icons">watch_later</i></a>
                                    </div>
                                    @endif

                                </td>
                            </tr>
                            {{-- @endif --}}
                            <div class="modal fade" id="mdModal{{$cola->id}}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Confirmacion</h4>
                                        </div>
                                        <div class="modal-body">
                                            Seguro desea eliminar el REPORTE: <br />{{$cola->user_report}}
                                        </div>
                                        <div class="modal-footer">
                                            {!!Form::open(['route'=>['cola.destroy', $cola->id],'method'=>'DELETE']) !!}
                                            <button class="btn bg-red waves-effect icon-button-demo" title="Eliminar"
                                                type="sumit">
                                                <i class="material-icons ">delete</i>
                                            </button>
                                            <button type="button" class="btn btn-link waves-effect"
                                                data-dismiss="modal">CLOSE</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>



                            @endif

                            @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h2>
                    NO POSEE REPORTES ASOCIADOS
                </h2>
                @endif
            </div>
        </div>
    </div>

</div>








@php
$tam = sizeof($assets);
@endphp
@if(Auth::user()->type !=='USER')
<!-- #END# Search Bar -->
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    REPORTES DE ACTIVOS DE LOS USUARIOS
                </h2>
            </div>
            <div class="body">
                @if($tam>0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>NRO</th>
                                <th>USUARIO</th>
                                <th>EMPRESA</th>

                                <th>NRO. ACTIVO</th>
                                <th>TIPO</th>
                                <th>MARCA</th>
                                {{-- <th>MODELO</th> --}}
                                {{-- <th>PRIORIDAD</th> --}}
                                <th>FECHA DE CREACION DE REPORTE</th>
                                <th>FECHA DE ATENCION DEL REPORTE</th>
                                {{-- <th>SERIAL</th> --}}
                                {{-- <th>LOCALIZACIÓN</th> --}}
                                <th>REPORTE</th>
                                <th>HISTORIA DEL REPORTE</th>

                            </tr>
                        </thead>
                        @php
                        $nro=0;
                        @endphp
                        <tbody>
                            @foreach($reportes as $report)

                            @php
                            $nro++;
                            @endphp
                            <tr>
                                <td>{{$nro}}</td>

                                @foreach($users as $user)
                                @if($report->id_user == $user->id)
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                @endif
                                @endforeach

                                @foreach($companies as $company)
                                @if($report->company_id == $company->id)
                                <td>{{$company->name}}</td>
                                @endif
                                @endforeach

                                <td>{{$report ->number}}</td>
                                @foreach($assets_types as $assets_type)
                                @if($report->assets_type_id == $assets_type->id)
                                <td>{{$assets_type->type}}</td>
                                @endif
                                @endforeach
                                @foreach($brands as $brand)
                                @if($report->brand_id == $brand->id)
                                <td>{{$brand->name}}</td>
                                @endif
                                @endforeach
                                {{-- <td>{{$asset ->brand_id}}</td> --}}
                                {{-- <td>{{$report ->model}}</td>
                                <td>
                                    @if($report->state==1)

                                    {{$report ->priority}}
                                    @endif
                                </td> --}}
                                <td>{{$report ->created}}</td>
                                <td>{{$report ->attended}}</td>
                                {{-- <td>{{$asset ->serial}}</td> --}}

                                <td>
                                    @if($report->state==1)
                                    <div class="icon-button-demo">
                                        <a href="{{asset('/reporttec/')}}/{{$report->id}}"
                                            class="btn bg-green waves-effect" type="sumit">
                                            <i class="material-icons">build</i></a>
                                    </div>
                                    @endif

                                </td>
                                <td>
                                    @if($report->state==2)
                                    <div class="icon-button-demo">
                                        <a href="{{asset('/historyreport/')}}/{{$report->id}}"
                                            class="btn bg-purple waves-effect" type="sumit">
                                            <i class="material-icons">watch_later</i></a>
                                    </div>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h2>
                    NO HAY REPORTES DE LOS USUARIOS
                </h2>
                @endif
            </div>
        </div>
    </div>

</div>
<!-- #END# Basic Examples -->


@endif





















































































































































{{-- <div class="container-fluid">
        <div class="block-header">
            <h2>GESTIÓN DE TICKETS</h2>
        </div>
        <!------------------------------------------------------------------Vista para los Administradores y tecnicos--------------------------------------------------------------------------->
        <div class="row clearfix">
                @php
                    $pend=0;
                    $assig=0;
                    $block=0;
                    $work=0;
                    $solve=0;
                @endphp
                @foreach($status as $status1)
                    @switch($status1->status)
                            @case('NEW')
                                @php
                                    $new= $status1->ticked_count;
                                @endphp
                            @break

                            @case('ASSIGNED')
                                @php
                                    $assig= $status1->ticked_count;
                                @endphp
                            @break
                            @case('BLOCKED')
                                @php
                                    $block= $status1->ticked_count;
                                @endphp
                            @break
                            @case('WORKING')
                                @php
                                    $work= $status1->ticked_count;
                                @endphp
                            @break
                            @case('SOLVED')
                                @php
                                    $solve= $status1->ticked_count;
                                @endphp
                            @break
                            @case('PENDING')
                            @php
                                $pend= $status1->ticked_count;
                            @endphp
                            @break
                    @endswitch
                @endforeach

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                    <i class="material-icons">assignment</i>
                            </div>
                            <div class="content">
                                <div class="text">TICKETS PENDIENTES</div>
                                <div class="number count-to" data-from="0" data-to="{{$pend}}" data-speed="1000"
data-fresh-interval="20"></div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">build</i>
        </div>
        <div class="content">
            <div class="text">TICKETS EN PROCESO</div>
            <div class="number count-to" data-from="0" data-to="{{$work}}" data-speed="1000" data-fresh-interval="20">
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red hover-expand-effect">
        <div class="icon">
            <i class="material-icons">lock</i>
        </div>
        <div class="content">
            <div class="text">TICKETS BLOQUEADOS</div>
            <div class="number count-to" data-from="0" data-to="{{$block}}" data-speed="1000" data-fresh-interval="20">
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
        <div class="icon">
            <i class="material-icons">beenhere</i>
        </div>
        <div class="content">
            <div class="text">TICKETS RESUELTOS</div>
            <div class="number count-to" data-from="0" data-to="{{$solve}}" data-speed="1000" data-fresh-interval="20">
            </div>
        </div>
    </div>
</div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="card">
            <div class="header">
                <h2>MIS TICKETS</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ticket</th>
                                <th>Estatus</th>
                                <th>Usuario</th>
                                <th>Prioridad</th>
                                <!--    <th>Tiempo Transcurrido</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            @if(Auth::user()->id === $ticket->admin_id )
                            @if( $ticket->status <> 'CLOSED' )
                                <tr>
                                    <td><a href="{{asset('/tickets/')}}/{{$ticket ->id}}">{{$ticket ->id}}</a></td>
                                    <td>{{$ticket->description}}</td>
                                    @include('admin.soporte.cau.statusticket')
                                    @foreach($users as $user)
                                    @if($ticket->user_id === $user->id)
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    @endif
                                    @endforeach
                                    @if($ticket ->priority == 'LOW')
                                    @php
                                    $labelp="label bg-blue";
                                    $priority="BAJA";
                                    @endphp
                                    @endif
                                    @if($ticket ->priority == 'MEDIUM')
                                    @php
                                    $labelp="label bg-orange";
                                    $priority="MEDIA";
                                    @endphp
                                    @endif
                                    @if($ticket ->priority == 'HIGH')
                                    @php
                                    $labelp="label bg-red";
                                    $priority="ALTA";
                                    @endphp
                                    @endif
                                    <td><span class="{{$labelp}}">{{$priority}}</span></td>
                                    <!-- <td>
                                                <div class="progress">
                                                    <div class="info-box bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td> -->
                                </tr>
                                @endif
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>MI PLANIFICACIÓN</h2>
            </div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>COMPAÑÍA</th>
                                <th>FECHA DE PLANIFICACIÓN </th>
                                <th>FECHA PLANIFICADA </th>
                                <th>TIPO DE MANTENIEMIENTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plans as $plan)
                            <tr>
                                <td><a href="{{asset('/planning/')}}/{{$plan ->id}}">{{$plan ->id}}</a></td>
                                @foreach($companies as $company)
                                @if($plan->company_id == $company->id)
                                <td>{{$company->name}}</td>
                                @endif
                                @endforeach
                                @php
                                $plane =date ( 'd-m-Y' , strtotime ( $plan->planning_at) );
                                $planificado =date ( 'd-m-Y' , strtotime ( $plan->planned_at) );
                                @endphp
                                <td>{{$plane}}</td>
                                <td>{{$planificado}}</td>
                                @if($plan->type =="1")
                                <td>PLANIFICACIÓN MENSUAL</td>
                                @else
                                @if($plan->type == "2")
                                <td>PLANIFICACIÓN ANUAL</td>
                                @else
                                <td>Error</td>
                                @endif
                                @endif
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Task Info -->

</div>
</div>
</div> --}}

@endsection

@section('scripts')
<script>
    function pregunta(){
        if (confirm('SEGURO QUIERE ELIMINAR?')){
            document.tuformulario.submit()
        }
    }
</script>

<!-- Jquery CountTo Plugin Js -->
{!! Html::script ('plugins/jquery-countto/jquery.countTo.js') !!}

<!-- Morris Plugin Js -->
{!! Html::script ('plugins/raphael/raphael.min.js') !!}
{!! Html::script ('plugins/morrisjs/morris.js') !!}

<!-- ChartJs -->
{!! Html::script ('plugins/chartjs/Chart.bundle.js') !!}

<!-- Sparkline Chart Plugin Js -->
{!! Html::script ('plugins/jquery-sparkline/jquery.sparkline.js') !!}

<!-- Custom Js -->
{!! Html::script ('js/pages/index.js') !!}
@endsection