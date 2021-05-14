@extends('layout.master')

@section('title','HELPDESK')

@section('content')


<div class="block-header">
    <h2>
        INVENTARIO
    </h2>
</div>
@include('messages.men_exitoso')
@include('messages.men_fallido')
<!-- #END# Search Bar -->
<div class="container-fluid">
    <!-- Example Tab -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header">
                                <h2>
                                    CONSUMIBLES
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
                                        <a href="{{asset('/consumables/create')}}" role="button" button
                                            class="btn btn-block bg-blue waves-effect" type="submit">
                                            <i class="material-icons">add</i></a></a>
                                    </div>
                                </div>
                            </div>

                            <div class="body">
                                <div class="table-responsive">

                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>NRO</th>
                                                <th>CECO</th>
                                                <th>USUARIO</th>
                                                <th>ACTIVO</th>
                                                <th>TIPO CONSUMIBLE</th>
                                                <th>MODELO CONSUMIBLE</th>
                                                <th>STOCK</th>
                                                <th>EN USO</th>
                                                <th>EDITAR</th>
                                                <th>HISTORIAL</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $nro=0;
                                        @endphp
                                        <tbody>

                                            @foreach($consumables as $consumable)
                                            <tr>
                                                @php
                                                $nro++;
                                                @endphp
                                                <td>{{$nro}}</td>
                                                @foreach ($cecos as $ceco)
                                                @if($ceco->id==$consumable->ceco_id)
                                                <td> {{$ceco->number}}</td>
                                                @break
                                                @endif
                                                @endforeach
                                                @foreach ($users as $user)
                                                @if($user->id==$consumable->user_id)
                                                <td>{{$user->name}}</td>
                                                @break
                                                @endif
                                                @endforeach
                                                @foreach ($assets as $asset)
                                                @if($asset->id==$consumable->assets_id)
                                                @if($asset->assets_type_id==2)
                                                <td>IMPRESORA {{$asset->model}}</td>
                                                @elseif($asset->assets_type_id==9)
                                                <td>FOTOCOPIADORA {{$asset->model}}</td>
                                                @endif
                                                @break
                                                @endif
                                                @endforeach
                                                <td>{{$consumable->type}}</td>

                                                <td>{{$consumable->model}}</td>

                                                <td>{{$consumable->stock}}</td>
                                                <td>{{$consumable->use}}</td>
                                                <td>
                                                    <div class="icon-button-demo">
                                                        <a href="{{asset('/consumables/')}}/{{$consumable->id}}/edit"
                                                            class="btn bg-orange waves-effect" type="sumit">
                                                            <i class="material-icons">edit</i></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="icon-button-demo">
                                                        <a href="{{asset('/historyconsumable/')}}/{{$consumable->id}}"
                                                            class="btn bg-blue waves-effect" type="sumit">
                                                            <i class="material-icons">history</i></a>
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