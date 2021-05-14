@extends('layout.master')
@section('title','HELPDESK-INVENTARIO')
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

                    <h2> Nuevo Periferico</h2>

                </div>
                <div class="body">
                   {!! Form::open(['route'=>'peripheral.store','method'=>'POST']) !!}
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <select class="form-control show-tick" name="brands_id" required>
                                <option value="">MARCA</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control show-tick" name="type" required>
                                <option value="">TIPO</option>
                                
                                    <option value="REG/UPS">REG/UPS</option>
                                    <option value="TECLADO">TECLADO</option>
                                    <option value="MOUSE">MOUSE</option>
                                    <option value="PARLANTES">PARLANTES</option>
                                
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="model" required>
                                    <label class="form-label">MODELO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="serial" required>
                                    <label class="form-label">SERIAL</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                                <select class="form-control show-tick" name="operational" required>
                                    <option value="">OPERATIVO</option>
                                    
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    
                                </select>
                            </div>
                            <div class="col-sm-3">
                                    <select class="form-control show-tick" name="assigned" required>
                                        <option value="">ASIGNADO</option>
                                        
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        
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

@endsection

