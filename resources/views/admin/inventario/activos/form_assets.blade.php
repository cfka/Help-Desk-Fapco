@extends('layout.master')
@section('title','Activo Nuevo')
@section('content')
<div class="block-header">

    <h2>
        INVENTARIO
    </h2>

</div>
@include('messages.validacion')

<!-- Input-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <h2>CREAR ACTIVO</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>'assets.store','method'=>'POST']) !!}
                @csrf


                <h2 class="card-inside-title">ASIGNADO A</h2>
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <select class="form-control show-tick" id="company" name="company_id" required
                            data-live-search="true">
                            <option value="">UNIDAD DE NEGOCIO</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-sm-3" >
                            <select class="form-control show-tick" data-live-search="true""  name="ceco_id" id="ceco">
                                <option value="">CECO</option>
                                @foreach($cecos as $ceco)
                                    <option value="{{$ceco->id}}">{{$ceco->number}}</option>
                    @endforeach
                    </select>
                </div> --}}
                <div class="col-sm-3" id="ceco" required>

                </div>

                <div class="col-sm-3" id="department" required>

                </div>


                <div class="col-sm-3" id='user_dep' name="user_id">
                    <select class="form-control show-tick" name="user_id" data-live-search="true"" required>
                                    <option value="">USUARIO</option>
                                        @foreach($users as $user)
                                        {{-- @if ($user->department_id == $asset->department_id) --}}
                                            <option value=" {{$user->id}}">{{$user->first_name}} {{$user->last_name}}
                        </option>
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
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="number">
                            <label class="form-label">ACTIVO FIJO</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <select class="form-control show-tick" name="assets_type_id" id="asset_type" required
                        data-live-search="true">
                        <option value="">TIPO DE EQUIPO</option>
                        @foreach($assets_types as $assets_type)
                        <option value="{{$assets_type->id}}">{{$assets_type->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control show-tick" name="brand_id" id="brand" required data-live-search="true">
                        <option value="">MARCA</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="model" required>
                            <label class="form-label">MODELO</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="serial" required>
                            <label class="form-label">SERIAL</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="location">
                            <label class="form-label">UBICACION</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="warranty">
                            <label class="form-label">PERIODO DE GARANTIA</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" name="warranty_end" value="<?php echo date("Y-m-d");?>"
                                class="form-control">
                            <label class="form-label">FIN DE GARANTIA</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="form-control show-tick" name="condition" id="condition" required>
                        <option value="">CONDICIÓN</option>
                        <option value="1">NUEVO</option>
                        <option value="2">USADO</option>
                        <option value="3">REPOTENCIADO</option>
                        <option value="4">DESINCORPORADO</option>
                    </select>
                </div>
                {{-- <div  class="col-sm-2" class="demo-checkbox">
                            <input type="checkbox" id="md_checkbox_6" class="chk-col-blue" checked="checked" name="is_active" value="1"/>
                            <label for="md_checkbox_6">ACTIVO</label>
                        </div> --}}

            </div>


            <h2 class="card-inside-title">ESPECIFICACIONES TECNICAS</h2>
            <div class="row clearfix" id="especificacion_tec">
                <div class="col-sm-4">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="motherboard">
                            <label class="form-label">PLACA BASE</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="processor">
                            <label class="form-label">PROCESADOR</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="RAM">
                            <label class="form-label">MEMORIA RAM</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" class="form-control"
                                name="HDD">
                            <label class="form-label">DISCO DURO</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <select class="form-control show-tick" name="CDDVD" id="CDDVD">
                        <option value="N/A">CD-DVD</option>
                        <option value="SI">SI</option>
                        <option value="N/A">N/A</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control show-tick" name="floppy" id="floppy">
                        <option value="N/A">FLOPPY</option>
                        <option value="SI">SI</option>
                        <option value="N/A">N/A</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control show-tick" name="software_id" required data-live-search="true">
                        <option value="1">SISTEMA OPERATIVO</option>
                        @foreach($softwares as $software)
                        <option value="{{$software->id}}">{{$software->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" value="N/A"
                                class="form-control" name="other_peripheral">
                            <label class="form-label">OTRO PERIFERICO</label>
                        </div>
                    </div>
                </div>
            </div>

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
                                <input type="text" style="text-transform:uppercase;" value="N/A" value="N/A" value="N/A"
                                    class="form-control" id="tmodel" name="tmodel">
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform:uppercase;" value="N/A" value="N/A" value="N/A"
                                    class="form-control" id="tserial" name="tserial">
                                <label class="form-label">SERIAL</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <input type="text" style="text-transform:uppercase;" id="mmodel" value="N/A"
                                    class="form-control" name="mmodel">
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform:uppercase;" id="mserial" value="N/A"
                                    class="form-control" name="mserial">
                                <label class="form-label">SERIAL</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <input type="text" style="text-transform:uppercase;" id="rmodel" value="N/A"
                                    class="form-control" name="rmodel">
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform:uppercase;" id="rserial" value="N/A"
                                    class="form-control" name="rserial">
                                <label class="form-label">SERIAL</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <input type="text" style="text-transform:uppercase;" id="omodel"
                                    style="text-transform:uppercase;" value="N/A" class="form-control" name="omodel">
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" style="text-transform:uppercase;" id="oserial" value="N/A"
                                    class="form-control" name="oserial">
                                <label class="form-label">SERIAL</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <h2 class="card-inside-title">ADQUISICION</h2>
            <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" name="bill_at" value="<?php echo date("Y-m-d");?>" class="form-control">
                            <!--<input type="text" style="text-transform:uppercase;" value="N/A"value="N/A"  class="form-control" name="bill_at"> -->
                            <label class="form-label">FECHA DE COMPRA</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" value="N/A"
                                class="form-control" name="nro_order">
                            <label class="form-label">PEDIDO/OC</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="form-control show-tick" name="supplier_id" required data-live-search="true">
                        <option value="">PROVEEDOR</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" value="N/A" value="N/A"
                                class="form-control" name="cost">
                            <label class="form-label">COSTO</label>
                        </div>
                    </div>
                </div>
            </div>


            <h2 class="card-inside-title">RESPONSABLE INSTALACION</h2>
            <div class="row clearfix">
                <div class="col-sm-3">
                    <select class="form-control " name="installed" required>
                        <option value="">RESPONSABLE DE INSTALACIÓN</option>
                        @foreach($users as $user)
                        @if ($user->type === 'ADMIN')
                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float" required>
                        <div class="form-line">
                            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>"
                                name="instalation_at">
                            <label class="form-label">FECHA DE INSTALACIÓN</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float" required>
                        <div class="form-line">
                            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>"
                                name="operation_at">
                            <label class="form-label">FECHA DE OPERACIÓN</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="form-control " name="supervised" required>
                        <option value="">INSTALACIÓN SUPERVISADA POR</option>
                        @foreach($users as $user)
                        @if($user->type === 'ADMIN')
                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" style="text-transform:uppercase;" class="form-control" name="description"
                                value="N/A">
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

                    <a href="{{asset('/aretorn/')}}" class="btn btn-success waves-effect" type="sumit">
                        <i class="material-icons"></i>Volver
                        Atrás</a>
                </div>

                <div class="col-sm-1">
                    <button class="btn btn-primary waves-effect" type="submit" name="boton"
                        value="Guardar">GUARDAR</button>
                </div>




            </div>

            {!! Form::close()!!}
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')
{!! Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}
{!!Html::script('js/admin/detail_asset.js')!!}
{!!Html::script('js/admin/select.js')!!}
<script>
    $( "#department" ) .change(function () {    
                onselectdepar();
            });  
</script>
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