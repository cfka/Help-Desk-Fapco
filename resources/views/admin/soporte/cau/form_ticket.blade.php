@extends('layout.master')

@section('title','Nuevo Ticket')

@section('content')
    <div class="block-header">
        <h2>
            SOPORTE
            <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>

    @include('messages.validacion')

    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        CREAR UN TICKET
                    </h2>
                </div>
                <div class="body">

                    {!!Form::open(['route'=>'tickets.store','method'=>'POST'])!!}
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <select class="form-control show-tick" name="failure_id" id="failure_id">
                                <option value="">-- FALLA --</option>
                                @foreach($failures as $failure)
                                    <option value="{{$failure->id}}">{{$failure->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control show-tick" data-live-search="true" name="user_id" id="user_select">
                                <option value="">-- USUARIO --</option>
                                @foreach($users   as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4" id="container">
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="description" >
                                    <label class="form-label">DETALLE DE FALLA</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line" id="planning_at">
                                    <input type="text" class="form-control" name="planning_at" >
                                    <label class="form-label">FECHA MANTENIMIENTO</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <select class="form-control show-tick" name="priority">
                                <option value="">-- PRIORIDAD --</option>
                                <option value="LOW">BAJA</option>
                                <option value="MEDIUM">MEDIA</option>
                                <option value="HIGH">ALTA</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control show-tick" name="admin_id">
                                <option value="">--TÉCNICO--</option>
                                @foreach($users as $user)
                                    @if($user->type == 'ADMIN')
                                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">GUARDAR</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    <!-- #END# Input -->

@endsection
@section('scripts')
    {!!Html::script('js/admin/asset_userselect.js')!!}
    {!!Html::script('js/admin/date_mante.js')!!}
@endsection