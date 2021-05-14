@extends('layout.master')
@section('title','SERVICIO')
@section('content')
    <div class="block-header">

        <h2>
            GESTIÓN
        </h2>

    </div>
    @include('messages.validacion')

    <!-- Input-->

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>NUEVO SERVICIO</h2>

                </div>
                <div class="body">
                    {!! Form::open(['route'=>'services.store','method'=>'POST']) !!}
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name">
                                    <label class="form-label">NOMBRE</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="price">
                                    <label class="form-label">PRECIO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="contract_id">
                                    <label class="form-label">NRO. CONTRATO</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="ceco_id">
                                    <label class="form-label">CECO</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">GUARDAR</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

@endsection