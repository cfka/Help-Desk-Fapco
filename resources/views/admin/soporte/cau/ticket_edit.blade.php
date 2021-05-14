@extends('layout.master')

@section('title','TICKET')

@section('content')
    <div class="block-header">
        <h2>
            TICKET {{$ticket->id}}
        </h2>
    </div>
    @include('messages.validacion')

    {!! Form::open(['route' => ['tickets.update', $ticket->id], 'method' => 'PUT']) !!}

            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ATENDER TICKET
                                <small>Tickets</small>
                            </h2>
                        </div>
                        <div class="body">
                            @php
                                $statust= "SELECCIONAR OPCIÓN";
                                $statusid= "";
                            @endphp
                            @switch($ticket->status)

                                @case('NEW')
                                @php
                                    $statust= "NUEVO";
                                    $statusid= "NEW";
                                @endphp
                                @break
                                @case('PENDING')
                                @php
                                    $statust= "PENDIENTE";
                                    $statusid= "PENDING";
                                @endphp
                                @break

                                @case('ASSIGNED')
                                @php
                                    $statust= "ASIGNADO";
                                    $statusid= "ASSIGNED";
                                @endphp
                                @break
                                @case('BLOCKED')
                                @php
                                    $statust= "BLOQUEADO";
                                   $statusid= "BLOCKED";
                                @endphp
                                @break
                                @case('WORKING')
                                @php
                                    $statust= "EN PROCESO";
                                    $statusid= "WORKING";
                                @endphp
                                @break
                                @case('SOLVED')
                                @php
                                    $statust= "SOLUCIONADO";
                                    $statusid= "SOLVED";
                                @endphp
                                @break
                                @case('CLOSED')
                                @php
                                    $statust= "CERRADO";
                                    $statusid= "CLOSED";
                                @endphp
                                @break
                                @php
                                    $statust= "ERROR";
                                    $statusid= "ERROR";
                                @endphp
                            @endswitch

                            @switch($ticket->priority)
                                @case('LOW')
                                @php

                                    $priority="BAJA";
                                @endphp
                                @break

                                @case('MEDIUM')
                                @php

                                   $priority="MEDIA";
                                @endphp
                                @break
                                @case('HIGH')
                                @php

                                    $priority="ALTA";
                                @endphp
                                @break
                                @php

                                   $priority= "ERROR";
                                @endphp
                                @break

                            @endswitch

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
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="user_id" value="{{$usuario}}" disabled="disabled">
                                            <label class="form-label">USUARIO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="asset_id" value="{{$ticket->asset_id}}" disabled="disabled" >
                                            <label class="form-label">ACTIVO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="failure_id" value="{{$failuret}}" disabled="disabled">
                                            <label class="form-label">FALLA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="description" value="{{$ticket->description}}"  >
                                            <label class="form-label">DESCRIPCIÓN</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">

                                            <input  type="text" class="form-control" name="priority" value="{{$priority}}" disabled="disabled" >
                                            <label class="form-label">PRIORIDAD</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control show-tick" name="status" id="statuschange" required>
                                        <option value="{{$statusid}}">{{$statust}}</option>

                                        <option value="WORKING">EN PROCESO</option>
                                        <option value="BLOCKED">BLOQUEADO</option>
                                        <option value="SOLVED">SOLUCIONADO</option>

                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <select class="form-control show-tick" name="admin_id">
                                        @foreach($users as $user)
                                            @if($user->type == 'ADMIN')
                                                <option value="{{$user->id}}" @if($user->id == $ticket->admin_id) selected @endif>{{$user->first_name}} {{$user->last_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- #END# Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card1">
                        <div class="header">
                            MOTIVO DE BLOQUEO
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="blocked_reason" >
                                            <label class="form-label">MOTIVO DE BLOQUEO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="solution">
                        <div class="header">
                            <h2>
                                SOLUCIONES
                            </h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="solution_id">
                                        <option value=" ">--Seleccione--</option>
                                        @foreach($solutions as $solution)
                                                <option value="{{$solution->id}}">{{$solution->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-9">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="detail_solution" >
                                            <label class="form-label">DETALLE</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <button class="btn btn-primary waves-effect" type="submit">GUARDAR</button>

                </div>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
@endsection
<!--------------------------------------------------------------Fin Editar ticket---------------------------------------------------------------------------------------------------------------->

@section('scripts')
    {!!Html::script('js/admin/blocked_reason.js')!!}
@endsection