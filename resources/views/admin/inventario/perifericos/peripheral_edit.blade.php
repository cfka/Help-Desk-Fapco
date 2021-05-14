@extends('layout.master')
@section('title','Activo')
@section('content')
    <div class="block-header">
        <h2>
            INVENTARIO
        </h2>
    </div>

    @include('messages.validacion')
    <!-- Input-->

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>Perifericos</h2>

                </div>
                <div class="body">
                    {!! Form::open(['route'=>['peripheral.update', $peripheral->id],'method'=>'PUT']) !!}
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <select class="form-control show-tick" name="name" required>
                                <option value="">MARCA</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @if($brand->id == $peripheral->brands_id) selected @endif>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control show-tick" name="type" required>
                                <option value="">TIPO</option>
                                    <option value="REG/UPS"  @if($peripheral->type == "REG/UPS") selected @endif>REG/UPS</option>
                                    <option value="TECLADO" @if($peripheral->type == "TECLADO") selected @endif >TECLADO</option>
                                    <option value="MOUSE" @if($peripheral->type == "MOUSE") selected @endif>MOUSE</option>
                                    <option value="PARLANTES" @if($peripheral->type == "PARLANTES") selected @endif>PARLANTES</option>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="model" value="{{$peripheral->model}}">
                                    <label class="form-label">MODELO</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="reference" value="{{$peripheral->serial}}">
                                    <label class="form-label">SERIAL</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                                <select class="form-control show-tick" name="operational" required>
                                    <option value="">OPERATIVO</option>
                                        <option value="SI"  @if($peripheral->operational == "SI") selected @endif>SI</option>
                                        <option value="NO" @if($peripheral->operational == "NO") selected @endif >NO</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                    <select class="form-control show-tick" name="assigned" required>
                                        <option value="">ASIGNADO</option>
                                            <option value="SI"  @if($peripheral->assigned == "SI") selected @endif>SI</option>
                                            <option value="NO" @if($peripheral->assigned == "NO") selected @endif >NO</option>
                                    </select>
                                </div>
                      
                    </div>

                    <button class="btn btn-primary waves-effect" type="submit">GUARDAR</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

    <!-- Slimscroll Plugin Js -->
    {!!Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js') !!}

    <!-- Waves Effect Plugin Js -->
    {!!Html::script('plugins/node-waves/waves.js') !!}

    <!-- Autosize Plugin Js -->
    {!!Html::script('plugins/autosize/autosize.js') !!}

    <!-- Moment Plugin Js -->
    {!!Html::script('plugins/momentjs/moment.js') !!}

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    {!!Html::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}

    <!-- Custom Js -->
    {!!Html::script('js/admin.js') !!}
    {!!Html::script('js/pages/forms/basic-form-elements.js') !!}

    <!-- Demo Js -->
    {!!Html::script('js/demo.js') !!}

@endsection

