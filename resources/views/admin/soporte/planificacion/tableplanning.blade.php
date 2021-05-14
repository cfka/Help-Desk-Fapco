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
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       Planificación
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
                            <a href="{{asset('/planning/create')}}" role="button" button class="btn btn-block bg-blue waves-effect" type="submit">
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
                                    <th>TÉCNICO</th>
                                    <th>COMPAÑIA</th>
                                    <th>FECHA DE PLANIFICACIÓN</th>
                                    <th>FECHA PLANIFICADA</th>
                                    <th>TIPO DE MANTENIMIENTO</th>
                                    <th>CRONOGRAMA</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <tr>
                                    <td><a href="{{asset('/planning/')}}/{{$plan->id}}" >{{$plan->id}}</a></td>
                                    @foreach($users as $user)
                                        @if($user->id === $plan->admin_id)
                                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        @endif
                                    @endforeach
                                    @foreach($companies as $company)
                                        @if($company->id === $plan->company_id)
                                        <td>{{$company->name}}</td>
                                    @endif
                                    @endforeach
                                    @php
                                        $plane =date ( 'd-m-Y' , strtotime ( $plan->planning_at) );
                                        $planificado =date ( 'd-m-Y' , strtotime ( $plan->planned_at) );
                                    @endphp

                                    <td>{{$plane}}</td>
                                    <td>{{$planificado}}</td>
                                    @if($plan->type =="1")
                                        <td>PLANIFICACIÓN MENSUAL</td>
                                    @else
                                        @if($plan->type == "2")
                                            <td>PLANIFICACIÓN ANUAL</td>
                                        @else
                                            <td>Error</td>
                                        @endif
                                    @endif
                                    <td>
                                        <div class="icon-button-demo">
                                            <a href="{{asset('/cronograma/')}}/{{$plan->id}}"  class="btn bg-blue waves-effect" type="sumit">
                                                <i class="material-icons">print</i></a>
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

    {!! Html::script('js/pages/tables/jquery-datatable.js ')!!}

@endsection


