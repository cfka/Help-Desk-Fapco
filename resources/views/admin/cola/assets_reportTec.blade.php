@extends('layout.master')
@section('title','Activo')
@section('content')

<style>
    textarea {
        resize: none;
        
    }
</style>


@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
    <div class="block-header">
        <h2>
            INICIO
        </h2>
    </div>
    
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        REPORTE
                    </h2>
                </div>
                <div class="body" id="body">
                        {!! Form::open(['route'=>['cola.update', $reporte->id],'method'=>'PUT']) !!}
                        <div class="icon-button-demo">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label" id="label">DESCRIPCIÓN DEL REPORTE</label>
                                        <div class="form-line">
                                        {{-- @foreach($reportes as $reporte) --}}
                                        <textarea  style="text-transform:uppercase; border-style: solid; border-width: 1px; padding-left:10px; padding-top:10px" class="form-control" name="tec_report" rows="10" cols="40" ></textarea>
                                        {{-- @endforeach --}}
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$asset->id}}">                                
                                <input type="hidden" name="bandera" value="123">                                
                            </div>
                       
                            {{-- <a href="{{asset('/reportuser/')}}"  class="btn bg-blue waves-effect" type="sumit">
                                <i class="material-icons"></i>GUARDAR</a> --}}
                                <br><br/>
                        </div>
                       

                        <div class="icon-button-demo">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label" id="label">DESCRIPCIÓN DE REPORTE DEL USUARIO</label>
                                        <div class="form-line">
                                        {{-- @foreach($reportes as $reporte) --}}
                                        <textarea  style="text-transform:uppercase; border-style: solid; border-width: 1px; padding-left:10px; padding-top:10px" class="form-control" name="user_report" rows="10" cols="40" readonly>{{$reporte->user_report}}</textarea>
                                        {{-- @endforeach --}}
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$asset->id}}">                                
                            </div>
                        </div>
                        <div class="row clearfix">

                            <div class="col-sm-10">
                                <button class="btn btn-success waves-effect" type="submit" name="boton" value="Volver"
                                    href="javascript:history.back()" value="Register"> Volver
                                    Atrás</button>
                            </div>
    
                            <div class="col-sm-1">
                                <button class="btn btn-primary waves-effect" type="submit" name="boton"
                                    value="Guardar">GUARDAR</button>
                            </div>
    
    
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    
    @php
        $bandera=0;
    @endphp
    {{-- @foreach($asset_historys as $asset) --}}
    
    @if($bandera==0)
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                        {{-- <h2>ACTIVO EN LA FECHA {{$asset->created_at}}</h2> --}}

                    </div>
                    <div class="body">

                        <h2 class="card-inside-title">ASIGNADO A</h2>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @foreach($companys as $company)
                                            @if($company->id == $asset->company_id)
                                                <input type="text" class="form-control"  readonly value='{{$company->name}}'> 
                                                <label class="form-label">COMPAÑIA</label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @foreach($cecos as $ceco)
                                                @if($ceco->id == $asset->ceco_id)
                                                    <input type="text" class="form-control"  readonly value='{{$ceco->number}}'> 
                                                    <label class="form-label">CECO</label>
                                                @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                                @foreach($departments as $department)
                                                @if($department->id == $asset->department_id)
                                                    <input type="text" class="form-control"  readonly value='{{$department->name}}'> 
                                                    <label class="form-label">DEPARTAMENTO</label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                                @foreach($users as $user)
                                                @if($user->id == $asset->user_id)
                                                    <input type="text" class="form-control"  readonly value='{{$user->first_name}} {{$user->last_name}}'> 
                                                    <label class="form-label">USUARIO</label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <h2 class="card-inside-title">DESCRIPCIÓN</h2>
                        <div class="row clearfix">
                            <div class="col-sm-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->number}}'>
                                            <label class="form-label">NUMERO</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @foreach($asset_types as $asset_type)
                                            @if($asset_type->id == $asset->assets_type_id)
                                                <input type="text" class="form-control"  readonly value='{{$asset_type->type}}'> 
                                                <label class="form-label">TIPO</label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @foreach($brands as $brand)
                                            @if($brand->id == $asset->brand_id)
                                                <input type="text" class="form-control"  readonly value='{{$brand->name}}'> 
                                                <label class="form-label">MARCA</label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->model}}'>
                                            <label class="form-label">MODELO</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control"  readonly value='{{$asset->serial}}'>
                                        <label class="form-label">SERIAL</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control"  readonly value="{{$asset->location}}">
                                        <label class="form-label">UBICACION</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->warranty}}'> 
                                            <label class="form-label">GARANTIA</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" class="form-control"  readonly value="{{$asset->warranty_end}}">
                                            <label class="form-label">FECHA DE TERMINO DE GARANTÍA</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            @if($asset->condition == "1") 
                                            <input type="text" class="form-control"  readonly value="NUEVO">
                                            @elseif($asset->condition == "2")
                                            <input type="text" class="form-control"  readonly value="USADO">
                                            @elseif($asset->condition == "3")
                                            <input type="text" class="form-control"  readonly value="REPOTENCIADO">
                                            @elseif($asset->condition == "4")
                                            <input type="text" class="form-control"  readonly value="DESINCORPORADO">
                                            @endif
                                            <label class="form-label">CONDICION</label>
                                        </div>
                                    </div>
                            </div>

                            {{-- <div class="demo-checkbox">
                                <input type="checkbox" id="md_checkbox_6" class="chk-col-blue"  checked="checked" name="is_active" value="1"/>
                                <label for="md_checkbox_6">ACTIVO</label>
                            </div> --}}
        

                            
                        </div>

                        {{-- <div class="row clearfix">
                            <div class="col-sm-10">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            @if($asset->description!="")
                                                <input type="text" class="form-control"  readonly value="{{$asset->description}}">
                                            @else
                                                <input type="text" class="form-control"  readonly value="N/A">
                                            @endif
                                            <label class="form-label">DESCRIPCION</label>
                                        </div>
                                    </div>
                            </div>
                        </div> --}}
                    


                        <h2 class="card-inside-title">ESPECIFICACIONES TECNICAS</h2>
                        <div class="row clearfix" id="especificacion_tec">

                        
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->motherboard}}'> 
                                            <label class="form-label">PLACA BASE</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->processor}}'> 
                                            <label class="form-label">PROCESADOR</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->RAM}}'> 
                                            <label class="form-label">MEMORIA RAM</label>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->HDD}}'> 
                                            <label class="form-label">DISCO DURO</label>
                                        </div>
                                    </div>
                            </div>
                        
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->CDDVD}}'> 
                                            <label class="form-label">UNIDAD DE CD-DVD</label>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->floppy}}'> 
                                            <label class="form-label">FLOPPY</label>
                                        </div>
                                    </div>
                            </div>
                        
                            
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            @foreach($softwares as $software)
                                                @if($software->id == $asset->software_id)
                                                    <input type="text" class="form-control"  readonly value='{{$software->name}}'> 
                                                    <label class="form-label">SISTEMA OPERATIVO</label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->other_peripheral}}'> 
                                            <label class="form-label">OTRO PERIFERICO</label>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>



                            @if($asset->tbrands_id==NULL)
                            <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">TECLADO</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                            <input type="text" class="form-control"  readonly value='N/A'> 
                                                            <label class="form-label">MARCA</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='N/A'> 
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='N/A'> 
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                                                              
                                    </div>
                                @else
                                <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">TECLADO</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    @foreach($brands as $brand)
                                                        @if($brand->id == $asset->tbrands_id)
                                                            <input type="text" class="form-control"  readonly value='{{$brand->name}}'> 
                                                            <label class="form-label">MARCA</label>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='{{$asset->tmodel}}'>
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='{{$asset->tserial}}'>
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                                                              
                                    </div>
                                @endif






                            @if($asset->mbrands_id==NULL)
                            <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">MOUSE</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                            <input type="text" class="form-control"  readonly value='N/A'> 
                                                            <label class="form-label">MARCA</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='N/A'> 
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='N/A'> 
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                          
                                    </div>
                                @else
                                <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">MOUSE</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    @foreach($brands as $brand)
                                                        @if($brand->id == $asset->mbrands_id)
                                                            <input type="text" class="form-control"  readonly value='{{$brand->name}}'> 
                                                            <label class="form-label">MARCA</label>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='{{$asset->mmodel}}'>
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='{{$asset->mserial}}'>
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                                                              
                                    </div>
                                @endif





                                @if($asset->rbrands_id==NULL)
                            <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">REG/UPS</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                            <input type="text" class="form-control"  readonly value='N/A'> 
                                                            <label class="form-label">MARCA</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='N/A'> 
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='N/A'> 
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                                                              
                                    </div>
                                @else
                                <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">REG/UPS</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    @foreach($brands as $brand)
                                                        @if($brand->id == $asset->rbrands_id)
                                                            <input type="text" class="form-control"  readonly value='{{$brand->name}}'> 
                                                            <label class="form-label">MARCA</label>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='{{$asset->rmodel}}'>
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='{{$asset->rserial}}'>
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                                                              
                                    </div>
                                @endif



                            @if($asset->obrands_id==NULL)
                            <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">OTRO</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                            <input type="text" class="form-control"  readonly value='N/A'> 
                                                            <label class="form-label">MARCA</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='N/A'> 
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='N/A'> 
                                                    <label class="form-label">SERIAL</label>
                                                </div>
                                            </div>
                                        </div>                     
                                    </div>
                                @else
                                <div class="row clearfix">
                                    <div  class="col-sm-1" class="demo-checkbox">
                                        <label for="md_checkbox_7">OTRO</label>
                                    </div>
                                    <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    @foreach($brands as $brand)
                                                        @if($brand->id == $asset->obrands_id)
                                                            <input type="text" class="form-control"  readonly value='{{$brand->name}}'> 
                                                            <label class="form-label">MARCA</label>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  readonly value='{{$asset->omodel}}'>
                                                        <label class="form-label">MODELO</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"  readonly value='{{$asset->oserial}}'>
                                                    <label class="form-label">SERIAL</label>
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
                                            <input type="date" class="form-control"  readonly value="{{$asset->bill_at}}">
                                            <label class="form-label">FECHA DE COMPRA</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->nro_order}}'>
                                            <label class="form-label">PEDIDO/OC</label>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            @foreach($suppliers as $supplier)
                                                @if($supplier->id == $asset->supplier_id)
                                                    <input type="text" class="form-control"  readonly value='{{$supplier->name}}'> 
                                                    <label class="form-label">PROVEEDOR</label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  readonly value='{{$asset->cost}}'>
                                            <label class="form-label">COSTO</label>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>


                        <h2 class="card-inside-title">INSTALACION</h2>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            @foreach($users as $user)
                                                @if($user->id == $asset->installed)
                                                    <input type="text" class="form-control"  readonly value='{{$user->first_name}} {{$user->last_name}}'> 
                                                    <label class="form-label">RESPONSABLE DE INSTALACIÓN</label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="date" class="form-control"  readonly value="{{$asset->instalation_at}}">
                                                <label class="form-label">FECHA DE INSTALACIÓN</label>
                                            </div>
                                        </div>
                                </div>
                            <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" class="form-control"  readonly value="{{$asset->operation_at}}">
                                            <label class="form-label">FECHA DE OPERACIÓN</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                            <div class="form-group form-float">
                                    <div class="form-line">
                                        @foreach($users as $user)
                                            @if($user->id == $asset->supervised)
                                                <input type="text" class="form-control"  readonly value='{{$user->first_name}} {{$user->last_name}}'> 
                                                <label class="form-label">INSTALACIÓN SUPERVISADA POR</label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float">
                                <div class="form-line">
                                    @foreach($users as $user)
                                        @if($user->id == $asset->document)
                                            <input type="text" class="form-control"  readonly value='{{$user->first_name}} {{$user->last_name}}'> 
                                            <label class="form-label">DOCUMENTO ELABORADO Y ALMACENADO POR</label>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            
                    </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
        @php
        $bandera++;
        @endphp
    @endif
    {{-- @endforeach --}}
@endsection
@section('scripts')
<script>
    document.getElementById("mytextarea").value = "Fifth Avenue, New York City";
</script>


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
@endsection

