@extends('layout.master')
@section('title','Nueva Compañía')
@section('content')
<div class="block-header">

    <h2>
        GESTIÓN
    </h2>

</div>
@include('messages.validacion')

@include('messages.men_exitoso')
@include('messages.men_fallido')
<!-- Input-->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <h2>NUEVA EMPRESA</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>'company.store','method'=>'POST']) !!}
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[A-Z0-9. -ÁÉÍÓU,]*[.,]{2,20}">
                                <label class="form-label">NOMBRE</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" name="description">
                                <label class="form-label">DETALLE</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">

                    <div class="col-sm-10">

                        <a href="{{asset('/company/')}}" class="btn btn-success waves-effect" type="sumit">
                            <i class="material-icons"></i>Volver
                            Atrás</a>
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
@endsection
@section('scripts')

@endsection