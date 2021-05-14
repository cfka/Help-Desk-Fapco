@extends('layout.master')

@section('title','HELPDESK')

@section('content')
   <!-- Basic Examples -->

    <div class="container-fluid">
        @include('messages.men_exitoso')
        @include('messages.men_fallido')
        <div class="block-header">

        </div>

        <div class="row clearfix">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>REPORTES</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="body">
                        {!!Form::open(['url'=>['informe'],'method'=>'POST'])!!}
                        <h5>Indicadores de gestión </h5>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="company_id" required>
                                    <option value="">SELECCIONE COMPAÑIA</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="fecha" required>
                                        <label class="form-label">FECHA DE MANTENIMIENTO</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-1 ">
                                        <button class="btn btn-primary waves-effect" type="submit">Generar</button>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div> --}}

                    <div class="body">
                        <h5>Inventario tecnológico</h5>
                        {!!Form::open(['url'=>['hardware'],'method'=>'POST','target'=>'_Blank'])!!}
                        <div class="row clearfix">

                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="company_id" required>
                                    <option value="">COMPAÑIA</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-1 ">
                                <button class="btn btn-primary waves-effect" type="submit">Generar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    
                    <div class="body">
                        <h5>Inventario tecnológico Especifico</h5>
                        {!!Form::open(['url'=>['hardwareespecifico'],'method'=>'POST','target'=>'_Blank'])!!}
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <select class="form-control show-tick" id="company" name="company_id_esp" required>
                                    <option value="">UNIDAD DE NEGOCIO</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3" id="ceco" required>
                                
                            </div>
                        
                            <div class="col-sm-3" id="department" required>
                        
                            </div>
                        
                
                            
                            <div class="col-xs-1 ">
                                <button class="btn btn-primary waves-effect" type="submit" >Generar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('scripts')
{!! Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}
{!!Html::script('js/admin/detail_asset.js')!!}
{!!Html::script('js/admin/select.js')!!}
<script>
        $( "#department" ) .change(function () {    
            onselectdepar();
        });  
</script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        language: "es"
    });

</script>
@endsection
