@extends('layout.master')
@section('title','Planificación')
@section('content')
    <div class="block-header">

        <h2>
            PLANIFICACIÓN
        </h2>

    </div>
    @include('messages.mensaje')
    @include('messages.men_exitoso')

    <!-- Input-->

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>NUEVA PLANIFICACIÓN</h2>

                </div>
                <div class="body">
                    {!! Form::open(['route'=>'planning.store','method'=>'POST']) !!}
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <select class="form-control show-tick" name="company_id" id="company_id">
                                <option value="">UNIDAD DE NEGOCIO</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="planned_at" required>
                                    <label class="form-label">FECHA DE PLANIFICACIÓN</label>
                                </div>
                                <div class="help-info">formato de fecha AAAA-MM-DD </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control show-tick" name="type" >
                                    <option value="">TIPO DE PLANIFICACIÓN</option>
                                    <option value="1">PLANIFICACIÓN MENSUAL</option>
                                    <option value="2">PLANIFICACIÓN ANUAL</option>
                            </select>
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
    {!!Html::script('js/admin/assets_list.js')!!}
@endsection