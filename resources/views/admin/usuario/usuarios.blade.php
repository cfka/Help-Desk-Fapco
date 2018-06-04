@extends('layout.master')

@section('title','nombre pagina')

@section('content')
        <div class="block-header">
            <h2>
                ADMINISTRACIÓN
                <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
            </h2>
        </div>
        <!-- #END# Search Bar -->
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            USUARIOS
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
                                <a href="{{asset('/users/create')}}" role="button" button class="btn btn-block bg-blue waves-effect" type="sumit">Crear</a>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Cargo</th>
                                    <th>Empresa</th>
                                    <th>Avatar</th>
                                    <th> </th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user ->document}}</td>
                                    <td>{{$user ->first_name}}</td>
                                    <td>{{$user ->email}}</td>
                                    <td>{{$user ->position}}</td>
                                    <td>{{$user ->department_id}}</td>
                                    <td>{{$user ->avatar}}</td>
                                    <td>
                                        <div class="icon-button-demo">
                                            <button type="button" class="btn bg-blue waves-effect"  >
                                                <i class="material-icons ">create</i>
                                            </button>
                                            {!!Form::open(['route'=>['users.destroy', $user->id],'method'=>'DELETE']) !!}
                                                <button  class="btn bg-red waves-effect" type="sumit">
                                                        <i class="material-icons ">delete</i>
                                                </button>
                                            {!! Form::close() !!}
                                        </div>
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



@endsection


