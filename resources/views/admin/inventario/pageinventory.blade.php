@extends('layout.master')

@section('title','HELPDESK')

@section('content')


    <div class="block-header">
        <h2>
            INVENTARIO
        </h2>
    </div>
    @include('messages.men_exitoso')
    <!-- #END# Search Bar -->
    <div class="container-fluid">
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        {{-- <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#assets" data-toggle="tab">ACTIVOS</a></li>
                            <li role="presentation"><a href="#perifericos" data-toggle="tab">PERIFERICO</a></li>

                        </ul> --}}
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="assets">
                                @include('admin.inventario.activos.tablaAssets')

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="perifericos">
                                @include('admin.inventario.perifericos.tableperifericos')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


