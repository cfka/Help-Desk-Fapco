@extends('layout.master')

@section('title','TICKET')

@section('content')
    <div class="block-header">
        <h2>
            CONFORMIDAD
        </h2>
    </div>

    @include('messages.validacion')

    @if($ticket->status == '')
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ASIGNAR TÉCNICO
                            <small>Tickets</small>
                        </h2>
                    </div>
                    <div class="body">
                        {!! Form::open(['route' => ['tickets.update', $ticket->id], 'method' => 'PUT']) !!}
                        @foreach($users as $user)
                            @if($ticket->user_id === $user->id)
                                @php
                                    $usuario= $user->first_name." ".$user->last_name;
                                    $iduser=$user->id;
                                @endphp
                            @endif
                        @endforeach
                        @foreach($failures as $failure)
                            @if($ticket->failure_id === $failure->id)
                                @php
                                    $failuret = $failure->name;
                                    $failureid =$failure->id;
                                @endphp
                            @endif
                        @endforeach


                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="user_id" value="{{$usuario}}" disabled="disabled">
                                        <label class="form-label">USUARIO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="asset_id" value="{{$ticket->asset_id}}" disabled="disabled" >
                                        <label class="form-label">ACTIVO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="failure_id" value="{{$failuret}}" disabled="disabled">
                                        <label class="form-label">FALLA</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="description" value="{{$ticket->description}}" disabled="disabled" >
                                        <label class="form-label">DESCRIPCIÓN</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            @if($ticket->priority == 'LOW')
                                @php
                                    $priori="label bg-blue";
                                @endphp
                            @endif
                            @if($ticket ->priority == 'MEDIUM')
                                @php
                                    $priori="label bg-orange";
                                @endphp
                            @endif
                            @if($ticket ->priority == 'HIGH')
                                @php
                                    $priori="label bg-red";
                                @endphp
                            @endif
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input  type="text" class="form-control" name="description" value="{{$ticket->priority}}" disabled="disabled" >
                                        <label class="form-label">PRIORIDAD</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="admin_id">
                                    <option value="">-- ASIGNADO A --</option>
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
    @endif

@endsection
@section('scripts')

    <!-- Slimscroll Plugin Js -->
    {!!Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js') !!}

    <!-- Waves Effect Plugin Js -->
    {!!Html::script('plugins/node-waves/waves.js') !!}

    <!-- Autosize Plugin Js -->
    {!!Html::script('plugins/autosize/autosize.js') !!}

    <!-- Moment Plugin Js -->
    {!!Html::script('plugins/momentjs/moment.js') !!}

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    {!!Html::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}

    <!-- Custom Js -->
    {!!Html::script('js/admin.js') !!}
    {!!Html::script('js/pages/forms/basic-form-elements.js') !!}

    <!-- Demo Js -->
    {!!Html::script('js/demo.js') !!}

@endsection