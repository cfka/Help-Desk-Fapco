@extends('layout.master')

@section('title','HELPDESK')

@section('content')
    <div class="block-header">
        <h2>
            ADMINISTRACIÓN<!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>
    <!-- #END# Search Bar -->


    <!-- Basic Examples -->
    @include('messages.men_exitoso')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        TICKETS
                    </h2>
                    <!-- Search Bar -->
                    <div class="search-bar">
                        <div class="search-icon">
                            <i class="material-icons">search</i>
                        </div>
                        <input type="text" placeholder="START TYPING...">
                        <div class="close-search">
                            <i class="material-icons">close</i>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-1 pull-right">
                            <a href="{{asset('/tickets/create')}}" role="button" button class="btn btn-block bg-blue waves-effect" type="submit">
                                <i class="material-icons">add</i></a></a>
                        </div>
                    </div>

                </div>
                <div class="body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>ACTIVO</th>
                                <th>ESTADO</th>
                                <th>FALLA</th>
                                <th>PRIORIDAD</th>
                                <th>FUENTE</th>
                                <th>USUARIO</th>
                                <th>TECNICO</th>
                                <th>FECHA DE CREACIÓN</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tickets as $ticket)

                                    <tr>
                                       <td> <a href="{{asset('/tickets/')}}/{{$ticket ->id}}" >{{$ticket ->id}}</a> </td>
                                        @foreach($assets as $asset)
                                            @if($ticket->asset_id == $asset->id)
                                                <td>{{$asset->number}}</td>
                                            @endif
                                        @endforeach
                                        @include('admin.soporte.cau.statusticket')
                                        @foreach($failures as $failure)
                                            @if($ticket->failure_id == $failure->id)
                                                <td>{{$failure->name}}</td>
                                            @endif
                                        @endforeach
                                        @include('admin.soporte.cau.priority')

                                        @foreach($sources as $source)
                                            @if($ticket->source_id == $source->id)

                                                <td>{{$source->name}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($users as $user)
                                            @if($ticket->user_id == $user->id)
                                                <td>{{$user->first_name}} {{$user->last_name}} </td>
                                            @endif
                                        @endforeach
                                        @if($ticket->admin_id)
                                            @foreach($users as $user)
                                                @if($ticket->admin_id == $user->id)
                                                    <td>{{$user->first_name}} {{$user->last_name}} </td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td>SIN ASIGNAR</td>
                                        @endif

                                        <td>{{$ticket ->created_at}}</td>
                                        <td>
                                            @if($ticket->status !== 'SOLVED')
                                                @if($ticket->status !== 'CLOSED'  )
                                                    <div class="icon-button-demo">
                                                        <a href="{{asset('/tickets/')}}/{{$ticket->id}}/edit"  class="btn bg-orange waves-effect"  type="sumit">
                                                            <i class="material-icons">edit</i></a>
                                                    </div>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->



@endsection

@section('scripts')


    <!-- Jquery DataTable Plugin Js -->
    {!!Html::script('plugins/jquery-datatable/jquery.dataTables.js')!!}

    {!!Html::script('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/jszip.min.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/pdfmake.min.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/vfs_fonts.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')!!}

    {!!Html::script('plugins/jquery-datatable/extensions/export/buttons.print.min.js')!!}

    {!! Html::script('js/pages/tables/jquery-datatable.js ')!!}

@endsection


