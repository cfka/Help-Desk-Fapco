@extends('layout.master')

@section('title','HELPDESK')

@section('content')

    <div class="block-header">
            <h2>
                USUARIO
                <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
            </h2>
        </div>
        <!-- #END# Search Bar -->
        <!-- Basic Examples -->
        @include('messages.men_exitoso')
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>   USUARIOS</h2>
                        <div class=" ">
                            <div class=" pull-right">
                                <a href="{{asset('/users/create')}}" role="button" button class="btn btn-block bg-blue waves-effect" type="sumit">
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
                                        <th>CÉDULA</th>
                                        <th>NOMBRE</th>
                                        <th>CORREO</th>
                                        <th>CARGO</th>
                                        <th>DEPARTAMENTO</th>
                                        <th>TIPO DE USUARIO</th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td> <a href="{{asset('/users/')}}/{{$user->id}}" >{{$user ->id}}</a></td>
                                            <td>{{$user ->document}}</td>
                                            <td>{{$user ->first_name}} {{$user ->last_name}}</td>
                                            <td>{{$user ->email}}</td>
                                            <td>{{$user ->position}}</td>
                                            @foreach($companies as $company)
                                                @if($user->company_id == $company->id)
                                                    <td>{{$company->name}}</td>
                                                @endif
                                            @endforeach
                                            @if($user ->type === 'ADMIN')
                                                <td>ADMINISTRADOR</td>
                                            @else
                                                @if($user ->type === 'USER')
                                                    <td>USUARIO</td>
                                                @else
                                                    @if($user ->type === 'OPER')
                                                        <td>OPERADOR</td>
                                                    @else
                                                        @if($user ->type === 'TECH')
                                                        <td>TÉCNICO</td>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif


                                            <td>
                                                <div class="icon-button-demo">
                                                    <a href="{{asset('/users/')}}/{{$user->id}}/edit"  class="btn bg-orange waves-effect" type="button">
                                                        <i class="material-icons">edit</i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn bg-red waves-effect icon-button-demo" title="Eliminar" type="sumit" data-toggle="modal" data-target="#mdModal{{$user->id}}">
                                                            <i class="material-icons ">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="mdModal{{$user->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="defaultModalLabel">Confirmacion</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Seguro desea eliminar el USUARIO {{$user ->first_name}} {{$user ->last_name}}
                                                        </div>
                                                        <div class="modal-footer">
                                                                {!!Form::open(['route'=>['users.destroy', $user->id],'method'=>'DELETE']) !!}
                                                                <button class="btn bg-red waves-effect icon-button-demo" title="Eliminar" type="sumit">
                                                                    <i class="material-icons ">delete</i>
                                                                </button>
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


