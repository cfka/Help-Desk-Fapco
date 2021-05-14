@extends('layout.master')

@section('title','CECO')

@section('content')
    <div class="block-header">
        <h2>
            ADMINISTRACIÓN
            <!--<small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
        </h2>
    </div>

    @include('messages.validacion')

    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        COMPAÑIA
                    </h2>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="{{$ceco->number}}"  >
                                    <label class="form-label"> NRO. CENTRO DE COSTO</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" value="{{$company->name}}"  >
                                    <label class="form-label"> COMPAÑIA</label>
                                </div>

                            </div>
                        </div>

                    </div>
            </div>
        </div>
    <!-- #END# Checkbox -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="body">
                    <div class="icon-button-demo">
                        <a href="{{asset('/returnce/')}}"  class="btn bg-blue waves-effect" type="sumit">
                            <i class="material-icons"></i>VOLVER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')


@endsection

