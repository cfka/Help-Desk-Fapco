@extends('layout.master')
@section('title','Nuevo Centro de Costos')
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

                <h2>NUEVO CENTRO DE COSTOS</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>'cecos.store','method'=>'POST']) !!}
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="number" required>
                                <label class="form-label">NÚMERO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control show-tick" name="company_id" id="select_ceco" required>
                            <option value="">COMPAÑÍAS</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="manager"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[A-Z. -ÁÉÍÓU,]{2,20}">
                                <label class="form-label">GERENTE</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">

                    <div class="col-sm-10">

                        <a href="{{asset('/cecos/')}}" class="btn btn-success waves-effect" type="sumit">
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