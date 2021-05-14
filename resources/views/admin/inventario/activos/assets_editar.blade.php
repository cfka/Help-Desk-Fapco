@extends('layout.master')
@section('title','Activo')
@section('content')




@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
<div class="block-header">
    <h2>
        INVENTARIO
    </h2>
</div>

@include('messages.validacion')
<!-- Input-->

@foreach($users as $user)
@if($asset->user_id === $user->id)
@php
$usuario= $user->first_name." ".$user->last_name;
$iduser=$user->id;
@endphp
@endif
@endforeach
{{-- @foreach($cecos as $ceco )
        @if($asset->ceco_id === $ceco->id)
            @php
                $centroc= $ceco->number;
                $idceco=$ceco->id;
            @endphp
        @endif
    @endforeach --}}
@foreach($brands as $brand )
@if($asset->brand_id === $brand->id)
@php
$asset_brand = $brand->name;
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

{{-- @php
        $supervisado="";
        $condition="";
        $instalador="";
    @endphp --}}
{{-- @switch($asset->condition)
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

    @endswitch --}}

@foreach($users as $user)
@if ($asset->installed === $user->id)
@php
$instalador =$user->first_name.''.$user->last_name;
@endphp
@endif
@endforeach
@foreach($users as $user)
@if ($asset->supervised === $user->id)
@php
$supervisado =$user->first_name.''.$user->last_name;
@endphp
@endif
@endforeach

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <h2>EDITAR ACTIVO</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>['assets.update', $asset->id],'method'=>'PUT']) !!}

                <h2 class="card-inside-title">ASIGNADO A</h2>
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <select class="form-control show-tick" id="company_id" name="company_id" data-live-search="true"">
                                <option value="">UNIDAD DE NEGOCIO</option>
                                @foreach($companys as $company)
                                    <option value=" {{$company->id}}" @if($company->id == $asset->company_id) selected
                            @endif>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3" name="ceco_id" id="ceco" data-live-search="true"">
                            <select class=" form-control show-tick" name="ceco_id" id="ceco_id" required
                        data-live-search="true"">
                                <option value="">CECO</option>
                                @foreach($cecos as $ce)
                                    @if($ce->company_id == $asset->company_id)
                                        <option value=" {{$ce->id}}" @if($asset->ceco_id == $ce->id) selected
                        @endif>{{$ce->number}}</option>
                        @endif
                        @endforeach
                        {{-- <option value="{{$ceco->id}}" @if($ceco->id) selected @endif>{{$ceco->number}}</option>
                        --}}
                        </select>
                    </div>
                    <div class="col-sm-3" name="department" id="depart">
                        <select class="form-control show-tick" name="department" id="department" required>
                            <option value="">AREA</option>
                            @foreach($departments as $department)
                            @if($department->ceco_id == $asset->ceco_id)
                            <option value="{{$department->id}}" @if ($asset->department_id == $department->id) selected
                                @endif>{{$department->name}} - {{$department->description}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3" id='user' name="user">
                        <select class="form-control show-tick" name="user" data-live-search="true"" required>
                                    <option value="">USUARIO</option>
                                        @foreach($users as $user)
                                        {{-- @if ($user->department_id == $asset->department_id) --}}
                                            <option value=" {{$user->id}}" @if ($asset->user_id == $user->id) selected
                            @endif>{{$user->first_name}} {{$user->last_name}}</option>
                            {{-- @endif --}}
                            @endforeach
                        </select>
                    </div>
                </div>


                <h2 class="card-inside-title">DESCRIPCIÓN</h2>
                <div class="row clearfix">

                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control" name="number"
                                    value="{{$asset->number}}">
                                <label class="form-label">ACTIVO FIJO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control show-tick" name="assets_type_id" id="asset_type"
                            data-live-search="true">
                            <option value="">TIPO DE EQUIPO</option>
                            @foreach($asset_types as $asset_type)
                            <option value="{{$asset_type->id}}" @if( $asset->assets_type_id === $asset_type->id )
                                selected @endif>{{$asset_type->type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="form-control show-tick" name="brand_id" id="brand" data-live-search="true">
                            <option value="">MARCA</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" @if( $asset->brand_id === $brand->id ) selected
                                @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control" name="model"
                                    value="{{$asset->model}}">
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control" name="serial"
                                    value="{{$asset->serial}}">
                                <label class="form-label">SERIAL</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    name="location" value="{{$asset->location}}">
                                <label class="form-label">UBICACION</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    name="warranty" value="{{$asset->warranty}}">
                                <label class="form-label">PERIODO DE GARANTIA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="warranty_end"
                                    value="{{$asset->warranty_end}}">
                                <label class="form-label">FECHA DE TERMINO DE GARANTÍA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="condition" required>
                            <option value="">CONDICION</option>
                            <option value="1" @if($asset->condition == "1") selected @endif>NUEVO</option>
                            <option value="2" @if($asset->condition == "2") selected @endif>USADO</option>
                            <option value="3" @if($asset->condition == "3") selected @endif>REPOTENCIADO</option>
                            <option value="4" @if($asset->condition == "4") selected @endif>DESINCORPORADO</option>

                        </select>
                    </div>



                </div>





                <h2 class="card-inside-title">ESPECIFICACIONES TECNICAS</h2>
                <div class="row clearfix" id="especificacion_tec">

                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    name="motherboard" @if (!empty($asset)) value="{{$asset->motherboard}}" @endif>
                                <label class="form-label">PLACA BASE</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    name="processor" @if (!empty($asset)) value="{{$asset->processor}}" @endif>
                                <label class="form-label">PROCESADOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control" name="RAM"
                                    @if (!empty($asset)) value="{{$asset->RAM}}" @endif>
                                <label class="form-label">MEMORIA RAM</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform: uppercase;" class="form-control" name="HDD"
                                    @if (!empty($asset)) value="{{$asset->HDD}}" @endif>
                                <label class="form-label">DISCO DURO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control show-tick" name="CDDVD" id="CDDVD">
                            <option value="N/A">UNIDAD DE CD-DVD</option>
                            <option value="SI" @if( $asset->CDDVD === "SI" ) selected @endif>SI</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control show-tick" name="floppy" id="floppy">
                            <option value="N/A">FLOPPY</option>
                            <option value="SI" @if( $asset->floppy === "SI" ) selected @endif>SI</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    {{-- <div class="col-sm-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="floppy" @if (!empty($asset)) value="{{$asset->floppy}}"@endif>
                    <label class="form-label">FLOPPY</label>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-3">
            <select class="form-control show-tick" name="software_id" data-live-search="true">
                <option value="1">SISTEMA OPERATIVO</option>
                @foreach($softwares as $software)
                <option value="{{$software->id}}" @if( $asset->software_id === $software->id ) selected
                    @endif>{{$software->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="other_peripheral"
                        value="{{$asset->other_peripheral}}">
                    <label class="form-label">OTRO PERIFERICO</label>
                </div>
            </div>
        </div>

    </div>



    @if (empty($asset->tbrands_id))
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_7" class="chk-col-blue" name="teclado_is_active" value="0"
                onclick="click_teclado()" />
            <label for="md_checkbox_7">TECLADO</label>
        </div>
        <div id="teclado" style="display:none">
            <div class="col-sm-2">
                <select class="form-control show-tick" id="tbrands_id" name="tbrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" value="N/A" value="N/A" value="N/A"
                            class="form-control" id="tmodel" name="tmodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" value="N/A" value="N/A" value="N/A"
                            class="form-control" id="tserial" name="tserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_7" class="chk-col-blue" name="teclado_is_active" value="1"
                onclick="click_teclado()" checked />
            <label for="md_checkbox_7">TECLADO</label>
        </div>
        <div id="teclado">
            <div class="col-sm-2">
                <select class="form-control show-tick" id="tbrands_id" name="tbrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if($asset->tbrands_id==$brand->id) selected @endif>{{$brand->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" value="{{$asset->tmodel}}"
                            class="form-control" id="tmodel" name="tmodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" value="{{$asset->tserial}}"
                            class="form-control" id="tserial" name="tserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif





    @if (empty($asset->mbrands_id))
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_8" class="chk-col-blue" name="mouse_is_active" value="0"
                onclick="click_mouse()" />
            <label for="md_checkbox_8">MOUSE</label>
        </div>
        <div id="mouse" style="display:none">
            <div class="col-sm-2">
                <select class="form-control show-tick" id="mbrands_id" name="mbrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="mmodel" value="N/A"
                            class="form-control" name="mmodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="mserial" value="N/A"
                            class="form-control" name="mserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_8" class="chk-col-blue" name="mouse_is_active" value="1"
                onclick="click_mouse()" checked />
            <label for="md_checkbox_8">MOUSE</label>
        </div>
        <div id="mouse">
            <div class="col-sm-2">
                <select class="form-control show-tick" id="mbrands_id" name="mbrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if($asset->mbrands_id==$brand->id) selected @endif>{{$brand->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="mmodel" value="{{$asset->mmodel}}"
                            class="form-control" name="mmodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="mserial" value="{{$asset->mserial}}"
                            class="form-control" name="mserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if (empty($asset->rbrands_id))
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_9" class="chk-col-blue" name="reg/ups_is_active" value="0"
                onclick="click_reg()" />
            <label for="md_checkbox_9">REG/UPS</label>
        </div>
        <div id="reg/ups" style="display:none">

            <div class="col-sm-2">
                <select class="form-control show-tick" id="rbrands_id" name="rbrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="rmodel" value="N/A"
                            class="form-control" name="rmodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="rserial" value="N/A"
                            class="form-control" name="rserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_9" class="chk-col-blue" name="reg/ups_is_active" value="1"
                onclick="click_reg()" checked />
            <label for="md_checkbox_9">REG/UPS</label>
        </div>
        <div id="reg/ups">

            <div class="col-sm-2">
                <select class="form-control show-tick" id="rbrands_id" name="rbrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if($asset->rbrands_id==$brand->id) selected @endif>{{$brand->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="rmodel" class="form-control"
                            name="rmodel" value="{{$asset->rmodel}}">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="rserial" value="{{$asset->rserial}}"
                            class="form-control" name="rserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif



    @if (empty($asset->obrands_id))
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_10" class="chk-col-blue" name="other_is_active" value="0"
                onclick="click_other()" />
            <label for="md_checkbox_10">OTRO</label>
        </div>
        <div id="other" style="display:none">

            <div class="col-sm-2">
                <select class="form-control show-tick" id="obrands_id" name="obrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="omodel"
                            style="text-transform: uppercase;" value="N/A" class="form-control" name="omodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="oserial" value="N/A"
                            class="form-control" name="oserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row clearfix">
        <div class="col-sm-1" class="demo-checkbox">
            <input type="checkbox" id="md_checkbox_10" class="chk-col-blue" name="other_is_active" value="1" checked
                onclick="click_other()" />
            <label for="md_checkbox_10">OTRO</label>
        </div>
        <div id="other">
            <div class="col-sm-2">
                <select class="form-control show-tick" id="obrands_id" name="obrands_id">
                    <option value="">MARCA</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if($asset->obrands_id==$brand->id) selected @endif >{{$brand->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="omodel"
                            style="text-transform: uppercase;" value="{{$asset->omodel}}" class="form-control"
                            name="omodel">
                        <label class="form-label">MODELO</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" style="text-transform: uppercase;" id="oserial" value="{{$asset->oserial}}"
                            class="form-control" name="oserial">
                        <label class="form-label">SERIAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif




    <h2 class="card-inside-title">ADQUISICION</h2>
    <div class="row clearfix">
        <div class="col-sm-3">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="date" style="text-transform: uppercase;" class="form-control" name="bill_at"
                        value="{{$asset->bill_at}}">
                    <label class="form-label">FECHA DE COMPRA</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="nro_order"
                        value="{{$asset->nro_order}}">
                    <label class="form-label">PEDIDO/OC</label>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <select class="form-control show-tick" name="supplier_id" data-live-search="true">
                <option value="">PROVEEDOR</option>
                @foreach($suppliers as $supplier)
                <option value="{{$supplier->id}}" @if( $asset->supplier_id == $supplier->id ) selected
                    @endif>{{$supplier->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="cost"
                        value="{{$asset->cost}}">
                    <label class="form-label">COSTO</label>
                </div>
            </div>
        </div>

    </div>


    <h2 class="card-inside-title">INSTALACION</h2>
    <div class="row clearfix">


        <div class="col-sm-3">
            <select class="form-control " name="installed">
                <option value="">RESPONSABLE DE INSTALACIÓN</option>
                @foreach($users as $user)
                @if ($user->type === 'ADMIN')
                <option value="{{$user->id}}" @if( $asset->installed === $user->id ) selected
                    @endif>{{$user->first_name}} {{$user->last_name}}</option>
                @endif
                @endforeach
            </select>
        </div>


        <div class="col-sm-3">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="date" style="text-transform: uppercase;" class="form-control" name="instalation_at"
                        value="{{$asset->instalation_at}}">
                    <label class="form-label">FECHA DE INSTALACIÓN</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="date" style="text-transform: uppercase;" class="form-control" name="operation_at"
                        value="{{$asset->operation_at}}">
                    <label class="form-label">FECHA DE OPERACIÓN</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <select class="form-control " name="supervised">
                <option value="">INSTALACIÓN SUPERVISADA POR</option>
                @foreach($users as $user)
                @if ($user->type === 'ADMIN')
                <option value="{{$user->id}}" @if( $asset->supervised === $user->id ) selected
                    @endif>{{$user->first_name}} {{$user->last_name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="description"
                        value="{{$asset->description}}">
                    <label class="form-label">DESCRIPCIÓN</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" class="form-control" readonly
                        value='{!!Auth::user()->first_name!!} {!!Auth::user()->last_name!!}'>
                    <label class="form-label">DOCUMENTO ALMACENADO Y ELABORADO POR: </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">

        <div class="col-sm-10">
            <button class="btn btn-success waves-effect" type="submit" name="boton" value="Volver"
                href="javascript:history.back()" value="Register"> Volver
                Atrás</button>
        </div>

        <div class="col-sm-1">
            <button class="btn btn-primary waves-effect" type="submit" name="boton" value="Guardar">GUARDAR</button>
        </div>


    </div>
    {{-- <button class="btn btn-primary waves-effect" type="submit" name="boton" value="Guardar">GUARDAR</button>

    <button class="btn btn-primary waves-effect" type="submit" name="boton" value="Volver"
        href="javascript:history.back()" value="Register"> Volver
        Atrás</button> --}}
    {!! Form::close() !!}

</div>
</div>

</div>

</div>
</div>
@endsection
@section('scripts')




{!! Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}
{!!Html::script('js/admin/detail_asset.js')!!}
{!!Html::script('js/admin/editaract.js')!!}
{{-- <script>
        $( "#department" ) .change(function () {    
            onselectdepar();
        });  
</script> --}}
<script>
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        language: "es"
    });

</script>
<script>
    function click_teclado(){
            if(document.getElementById("md_checkbox_7").value==1){
                document.getElementById("teclado").style.display = "none";
                document.getElementById("md_checkbox_7").value=0;
                $('#tbrands_id').prop("required", false);
                $('#tmodel').prop("required", false);
                $('#tserial').prop("required", false);
            }
            else{
                document.getElementById("teclado").style.display = "block";
                document.getElementById("md_checkbox_7").value=1;
                $('#tbrands_id').prop("required", true);
                $('#tmodel').prop("required", true);
                $('#tserial').prop("required", true);

            }
        }
</script>
<script>
    function click_mouse(){
            if(document.getElementById("md_checkbox_8").value==1){
                document.getElementById("mouse").style.display = "none";
                document.getElementById("md_checkbox_8").value=0;
                $('#mbrands_id').prop("required", false);
                $('#mmodel').prop("required", false);
                $('#mserial').prop("required", false);
            }
            else{
                document.getElementById("mouse").style.display = "block";
                document.getElementById("md_checkbox_8").value=1;
                $('#mbrands_id').prop("required", true);
                $('#mmodel').prop("required", true);
                $('#mserial').prop("required", true);
    
            }
        }
</script>
<script>
    function click_reg(){
            if(document.getElementById("md_checkbox_9").value==1){
                document.getElementById("reg/ups").style.display = "none";
                document.getElementById("md_checkbox_9").value=0;
                $('#rbrands_id').prop("required", false);
                $('#rmodel').prop("required", false);
                $('#rserial').prop("required", false);
            }
            else{
                document.getElementById("reg/ups").style.display = "block";
                document.getElementById("md_checkbox_9").value=1;
                $('#rbrands_id').prop("required", true);
                $('#rmodel').prop("required", true);
                $('#rserial').prop("required", true);
    
            }
        }
</script>
<script>
    function click_other(){
            if(document.getElementById("md_checkbox_10").value==1){
                document.getElementById("other").style.display = "none";
                document.getElementById("md_checkbox_10").value=0;
                $('#obrands_id').prop("required", false);
                $('#omodel').prop("required", false);
                $('#oserial').prop("required", false);
            }
            else{
                document.getElementById("other").style.display = "block";
                document.getElementById("md_checkbox_10").value=1;
                $('#obrands_id').prop("required", true);
                $('#omodel').prop("required", true);
                $('#oserial').prop("required", true);
    
            }
        }
</script>
@endsection