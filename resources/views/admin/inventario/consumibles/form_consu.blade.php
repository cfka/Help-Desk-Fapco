@extends('layout.master')
@section('title','Nuevo Consumible')
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

                <h2> Nuevo Consumible</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>'consumables.store','method'=>'POST']) !!}
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <select class="form-control show-tick" id='user' name="user" required>
                            <option value="">USUARIO</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3" id="asset" name='asset' required>

                    </div>

                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="type" required>
                            <option value="">TIPO</option>

                            <option value="CARTUCHO">CARTUCHO</option>
                            <option value="TONER">TONER</option>
                            <option value="CINTA">CINTA</option>
                            <option value="TINTA">TINTA</option>

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="brands_id" required>
                            <option value="">MARCA</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="model"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[A-Z0-9. -ÁÉÍÓU,]{2,225}">
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="min" required>
                                <label class="form-label">MINIMO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="max" required>
                                <label class="form-label">MAXIMO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="stock" required>
                                <label class="form-label">STOCK</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" max="1" name="use" required>
                                <label class="form-label">EN USO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" disabled name="recharge">
                                <label class="form-label">RECARGA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" disabled name="damaged">
                                <label class="form-label">DAÑADO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" disabled name="enter" value="0">
                                <label class="form-label">LLEGADA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" disabled name="replace" value="0">
                                <label class="form-label">REEMPLAZO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="description"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    pattern="[A-Z0-9. -ÁÉÍÓU,]{2,255}">
                                <label class="form-label">DESCRIPCION</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-5">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" readonly
                                    value='{!!Auth::user()->first_name!!} {!!Auth::user()->last_name!!}'>
                                <label class="form-label">DOCUMENTO ALMACENADO Y ELABORADO POR: </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">

                    <div class="col-sm-10">

                        <a href="{{asset('/consumables/')}}" class="btn btn-success waves-effect" type="sumit">
                            <i class="material-icons"></i>Volver
                            Atrás</a>
                    </div>

                    <div class="col-sm-1">
                        <button class="btn btn-primary waves-effect" type="submit" name="boton"
                            value="Guardar">GUARDAR</button>
                    </div>


                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}
{!!Html::script('js/admin/consumable.js')!!}
<script>
    $( "#user" ) .change(function () {    
                onselectuser();
            });  
</script>
{{-- <script>
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            language: "es"
        });

    </script> --}}
@endsection