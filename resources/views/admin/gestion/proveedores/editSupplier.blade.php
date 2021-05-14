@extends('layout.master')

@section('title','PROVEEDOR')

@section('content')
<div class="block-header">
    <h2>
        ADMINISTRACIÓN
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
                    EDITAR PROVEEDOR
                </h2>
            </div>
            <div class="body">
                {!! Form::open(['route' => ['supplier.update', $supplier->id], 'method' => 'PUT']) !!}
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="rif" value="{{$supplier->rif}}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[0-9.J-]{2,20}">
                                <label class="form-label"> RIF</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" value="{{$supplier->name}}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                <label class="form-label">NOMBRE</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="description"
                                    value="{{$supplier->description}}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                                <label class="form-label">DESCRIPCION</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="contac_phone"
                                    value="{{$supplier->contac_phone}}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[0-9.- N/A]{2,20}">
                                <label class="form-label"> NRO.TELEFONO</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="{{$supplier->email}}"
                                    required>
                                <label class="form-label">EMAIL</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row clearfix">

                    <div class="col-sm-10">
                        <a href="{{asset('/supplier/')}}" class="btn btn-success waves-effect" type="sumit">
                            <i class="material-icons"></i>Volver
                            Atrás</a>
                    </div>

                    <div class="col-sm-1">
                        <button class="btn btn-primary waves-effect" type="submit" name="boton"
                            value="Guardar">GUARDAR</button>
                    </div>


                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

<!-- #END# Input -->

@endsection
@section('scripts')

@endsection