@extends('layout.master')

@section('title','PLANIFICACIÓN')

@section('content')
    <div class="block-header">
        <h2>
            ADMINISTRACIÓN
            <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>

    @include('messages.validacion')
    @include('messages.men_exitoso')
    @include('messages.mensaje')

    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PLANIFICACIÓN ID {{$plan->id}}
                    </h2>
                    <div class="row clearfix">
                        <div class="col-xs-1 pull-right">

                            {!!Form::open(['url'=>['informe',$plan->id],'method'=>'POST']) !!}
                            <button class="btn btn-primary waves-effect"  data-toggle="tooltip" data-placement="bottom" title="Reporte de indicadores de Gestión" type="submit">Gestión</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="body">

                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="admin_id" value="{{$admin->first_name}}">
                                    <label class="form-label">CREADO POR</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company_id" value="{{$company->name}}">
                                    <label class="form-label">COMPAÑIA</label>
                                </div>
                            </div>
                        </div>
                        @php
                            $plane =date ( 'd-m-Y' , strtotime ( $plan->planning_at) );
                            $planificado =date ( 'd-m-Y' , strtotime ( $plan->planned_at) );
                        @endphp
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="planning_at" value="{{$plane}}">
                                    <label class="form-label">PLANIFICADO EL</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="planned_at" value="{{$planificado}}">
                                    <label class="form-label">PLANIFICADO PARA EL DIA </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <H5>EQUIPOS PLANIFICADOS PARA EL MANTENIMIENTO</H5>

                    <div class="row clearfix">
                            <div class="col-xs-1 pull-right">
                                {!!Form::open(['url'=>['ticketplanning',$plan->id],'method'=>'GET']) !!}
                                <button class="btn btn-primary waves-effect"  data-toggle="tooltip" data-placement="right" title="Generar ticket de Mantenimiento" type="submit"  @if($plan->gen_ticket) disabled @endif>Generar</button>

                                {!! Form::close() !!}
                            </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>FICHA TÉCNICA</th>
                                <th>TIPO</th>
                                <th>MARCA</th>
                                <th>USUARIO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assets as $asset)
                                <tr>
                                    <td>{{$asset ->datasheet_id}}</td>
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
                                    @foreach($users as $user)
                                        @if($asset->user_id == $user->id)
                                            <td>{{$user->first_name}} {{$user->last_name}} </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                    <div class="icon-button-demo">
                        <a href="{{asset('/returnpl/')}}"  class="btn bg-blue waves-effect" type="sumit">
                            <i class="material-icons"></i>VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')


@endsection

