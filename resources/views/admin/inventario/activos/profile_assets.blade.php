@extends('layout.master')
@section('title','Activo Nuevo')
@section('content')
    <div class="block-header">

        <h2>
            Activo
        </h2>

    </div>
    @include('messages.validacion')
    @foreach($users as $user)
        @if($asset->user_id === $user->id)
            @php
                $usuario= $user->first_name." ".$user->last_name;
                $iduser=$user->id;
            @endphp
        @endif
    @endforeach

    @foreach($assets_types as $assets_type )
        @if($asset->assets_type_id === $assets_type->id)
            @php
                $asset_type= $assets_type->type;
                $asset_types_id=$assets_type->id;
            @endphp
        @endif
    @endforeach
    @foreach($brands as $brand )
        @if($asset->brand_id === $brand->id)
            @php
                $asset_brand= $brand->name;
                $asset_brand_id=$assets_type->id;
            @endphp
        @endif
    @endforeach
    @foreach($softwares as $software )
        @if($asset->software_id === $software->id)
            @php
                $asset_software = $software->name;
                $asset_software_id=$software->id;
            @endphp
        @endif
    @endforeach
    @php
        $condition="";
    @endphp
    @switch($asset->condition)
        @case('1')
        @php
             $condition="NUEVO";
        @endphp
        @break

        @case('2')
        @php
            $condition="USADO";
        @endphp
        @break
        @case('3')
        @php
             $condition="REPOTENCIADO";
        @endphp
        @break
        @case('4')
        @php
             $condition="DESINCORPORADO";
        @endphp
        @break
        @php

            $condition= "ERROR";
        @endphp
        @break

    @endswitch



    <!-- Input-->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>Activo</h2>
                    <div class="row clearfix">
                        <div class="col-xs-1 pull-right">
                            {!!Form::open(['url'=>['activo',$asset->id],'method'=>'GET']) !!}
                            <button class="btn btn-primary waves-effect" type="submit">PDF</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="body">
                    {!! Form::open(['route'=>'assets.store','method'=>'POST']) !!}
                    @csrf

                    <h2 class="card-inside-title">Información Básica 1</h2>
                    <div class="row clearfix">

                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="number" value="{{$asset->number}}">
                                    <label class="form-label">ACTIVO FIJO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset_type}}">
                                    <label class="form-label">TIPO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset_brand}}">
                                    <label class="form-label">MARCA</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset->model}}">
                                    <label class="form-label">MODELO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset->serial}}">
                                    <label class="form-label">SERIAL</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset_software}}">
                                    <label class="form-label">SISTEMA OPERATIVO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$condition}}">
                                    <label class="form-label">CONDICIÓN</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset->location}}">
                                    <label class="form-label">LOCALIZACIÓN</label>
                                </div>
                            </div>
                        </div>

                        <div class="demo-checkbox">
                            <input type="checkbox" id="md_checkbox_6" class="chk-col-blue" checked="checked" name="is_active" value="1"/>
                            <label for="md_checkbox_6">ACTIVO</label>
                        </div>

                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$asset->description}}">
                                    <label class="form-label">DESCRIPCIÓN</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="card-inside-title">Especficaciones Tecnicas:</h2>
                    <div class="row clearfix" id="especificacion_tec">

                            <div class="col-sm-4" >
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="motherboard"  @if (!empty($asset_detail[0])) value="{{$asset_detail[0]->motherboard}}"@endif>
                                        <label class="form-label">PLACA BASE</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="processor" @if (!empty($asset_detail[0])) value="{{$asset_detail[0]->processor}}"@endif>
                                        <label class="form-label">PROCESADOR</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="RAM" @if (!empty($asset_detail[0])) value="{{$asset_detail[0]->RAM}}"@endif>
                                        <label class="form-label">MEMORIA RAM</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="HDD" @if (!empty($asset_detail[0])) value="{{$asset_detail[0]->HDD}}"@endif>
                                        <label class="form-label">DISCO DURO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="CDDVD" @if (!empty($asset_detail[0])) value="{{$asset_detail[0]->CDDVD}}"@endif >
                                        <label class="form-label">UNIDAD DE CD-DVD</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="floppy" @if (!empty($asset_detail[0])) value="{{$asset_detail[0]->floppy}}"@endif>
                                        <label class="form-label">FLOPPY</label>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <h2 class="card-inside-title">Instalación:</h2>
                    <div class="row clearfix">


                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    @foreach($users as $user)
                                        @if ($asset->installed === $user->id)
                                            <input type="text" class="form-control" name="installed" value="{{$user->first_name}} {{$user->last_name}}">
                                        @endif
                                    @endforeach
                                    <label class="form-label">RESPONSABLE DE INSTALACIÓN</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="instalation_at" value="{{$asset->instalation_at}}">
                                    <label class="form-label">FECHA DE INSTALACIÓN</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="operation_at" value="{{$asset->operation_at}}">
                                    <label class="form-label">FECHA DE OPERACIÓN</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    @foreach($users as $user)
                                        @if ($asset->supervised === $user->id)
                                            <input type="text" class="form-control" name="supervised" value="{{$user->first_name}} {{$user->last_name}}">
                                        @endif
                                    @endforeach
                                    <label class="form-label">NSTALACIÓN SUPERVISADA POR</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="card-inside-title">Asignado a:</h2>
                    <div class="row clearfix">

                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$companies->name}}">
                                    <label class="form-label">UNIDAD DE NEGOCIO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ceco" value="{{$cecos->number}}">
                                    <label class="form-label">CECO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="departments" value="{{$departments}}">
                                    <label class="form-label">AREA</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="user" value="{{$usuario}}">
                                    <label class="form-label">USUARIO</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="card-inside-title">Detalle de Adquisición</h2>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="bill_at" value="{{$asset->bill_at}}">
                                    <label class="form-label">FECHA DE ADQUISICIÓN</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="supplier" value="{{$suppliers->name}}">
                                    <label class="form-label">PROVEEDOR</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nro_order" value="{{$asset->nro_order}}">
                                    <label class="form-label">PEDIDO/OC</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="cost" value="{{$asset->cost}}">
                                    <label class="form-label">COSTO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="warranty" value="{{$asset->warranty}}">
                                    <label class="form-label">PERIODO DE GARANTIA</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="warranty_end" value="{{$asset->warranty_end}}">
                                    <label class="form-label">FECHA DE TERMINO DE GARANTÍA</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="icon-button-demo">
                        <a href="{{asset('/aretorn/')}}"  class="btn bg-blue waves-effect" type="sumit">
                            <i class="material-icons"></i>VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!!Html::script('plugins/momentjs/moment.js')!!}
    {!! Html::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
    {!! Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}
    {!!Html::script('js/admin/detail_asset.js')!!}
    {!!Html::script('js/admin/select.js')!!}
@endsection

