@extends('layout.master')
@section('title','Nuevo Departamento')
@section('content')
<div class="block-header">

    <h2>
        ADMINISTRACIÓN
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

                <h2>NUEVO DEPARTAMENTO</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>'department.store','method'=>'POST']) !!}
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[A-Z. -ÁÉÍÓU,]{2,20}">
                                <label class="form-label">NOMBRE</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="description"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    pattern="[A-Z. -ÁÉÍÓU,]{2,20}">
                                <label class="form-label">DESCRIPCIÓN</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control show-tick" name="ceco_id" id="select_ceco" required>
                            <option value="">CENTRO DE COSTOS</option>
                            @foreach($cecos as $ceco)
                            <option value="{{$ceco->id}}">{{$ceco->number}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row clearfix">

                    <div class="col-sm-10">

                        <a href="{{asset('/department/')}}" class="btn btn-success waves-effect" type="sumit">
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