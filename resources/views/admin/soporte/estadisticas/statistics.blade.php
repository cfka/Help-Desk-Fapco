@extends('layout.master')

@section('title','HELPDESK')

@section('content')
   <!-- Basic Examples -->

    <div class="container-fluid">
        @include('messages.men_exitoso')
        @include('messages.mensaje')
        <div class="block-header">
            <h2>
                ESTADISTICAS
            </h2>
        </div>

            <!-- #END# Line Chart -->
            <!-- Bar Chart -->

        <div class="row clearfix">
            <!-- Line Chart -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>LINE CHART</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="line_chart" class="graph"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')



@endsection


