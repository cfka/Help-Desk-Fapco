@extends('layout.master')
@section('title','PLANIFICACION')
@section('content')
    <div class="block-header">
        <h2>
           PLANIFICACIÓN
        </h2>
    </div>

    @include('messages.validacion')
    <!-- Input-->

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>PLANIFICACIÓN</h2>
                </div>
                <div class="body">
                    {!! Form::open(['route'=>['planning.update', $planning->id],'method'=>'PUT']) !!}
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
                                $plane =date ( 'd-m-Y' , strtotime ( $planning->planning_at) );
                                $planificado =date ( 'd-m-Y' , strtotime ( $planning->planned_at) );
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
                    <button class="btn btn-primary waves-effect" type="submit">GUARDAR</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
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

