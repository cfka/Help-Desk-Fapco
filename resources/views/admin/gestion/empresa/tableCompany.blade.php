@extends('layout.master')

@section('title','HELPDESK')

@section('content')
    <div class="block-header">
        <h2>
            ADMINISTRACIÓN
            <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>
    <!-- #END# Search Bar -->
    <!-- Basic Examples -->
    @include('messages.men_exitoso')
    @include('messages.men_fallido')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EMPRESAS
                    </h2>

                    <div class="row">

                        <div class="col-xs-1 pull-right">
                            <a href="{{asset('/company/create')}}" role="button" button class="btn btn-block bg-blue waves-effect" type="submit">
                                <i class="material-icons">add</i></a></a>
                        </div>
                    </div>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>number</th>
                                <th>NOMBRE</th>
                                <th>DETALLE</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $nro=0;
                            @endphp
                            @foreach($companies as $company)
                                @php
                                $nro++;
                                @endphp
                                <tr>
                                    <td>{{$nro}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->description}}</td>
                                    <td>
                                        <div class="icon-button-demo">
                                            <a href="{{asset('/company/')}}/{{$company->id}}/edit"  class="btn bg-orange waves-effect" type="sumit">
                                                <i class="material-icons">edit</i></a>
                                        </div>
                                    </td>
                                    <td>
                                            <button class="btn bg-red waves-effect icon-button-demo" title="Eliminar" type="sumit" data-toggle="modal" data-target="#mdModal{{$company->id}}">
                                                    <i class="material-icons ">delete</i>
                                            </button>

                                       
                                    </td>
                                </tr>
                                <div class="modal fade" id="mdModal{{$company->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Confirmacion</h4>
                                            </div>
                                            <div class="modal-body">
                                                Seguro desea eliminar la EMPRESA {{$company->name}}
                                            </div>
                                            <div class="modal-footer">
                                                    {!!Form::open(['route'=>['company.destroy', $company->id],'method'=>'DELETE']) !!}
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


