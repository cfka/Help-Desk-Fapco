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
@include('messages.men_exitoso')
@include('messages.men_fallido')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <h2> Editar Consumible</h2>

            </div>
            <div class="body">
                {!! Form::open(['route'=>['consumables.update', $consumables->id],'method'=>'PUT']) !!}

                <div class="row clearfix">
                    <div class="col-sm-3">
                        <select class="form-control show-tick" id='user' name="user" required>
                            <option value="">USUARIO</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($user->id == $consumables->user_id) selected
                                @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3" id="asset" name='asset' required>
                        <select class="form-control show-tick" id='asset' name="asset" required>
                            <option value="">ACTIVO</option>
                            @foreach($assets as $asset)
                            <option value="{{$asset->id}}" @if($asset->id == $consumables->assets_id) selected
                                @endif>{{$asset->model}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="type" required>
                            <option value="">TIPO</option>

                            <option value="CARTUCHO" @if($consumables->type == "CARTUCHO") selected @endif>CARTUCHO
                            </option>
                            <option value="TONER" @if($consumables->type == "TONER") selected @endif>TONER</option>
                            <option value="CINTA" @if($consumables->type == "CINTA") selected @endif>CINTA</option>
                            <option value="TINTA" @if($consumables->type == "TINTA") selected @endif>TINTA</option>

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control show-tick" name="brands_id" required>
                            <option value="">MARCA</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" @if($brand->id == $consumables->brand_id) selected
                                @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                    pattern="[A-Z0-9. -ÁÉÍÓU,]{2,225}" name="model" value='{{$consumables->model}}'>
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="min"
                                    value='{{$consumables->min}}' required>
                                <label class="form-label">MINIMO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="max"
                                    value='{{$consumables->max}}' required>
                                <label class="form-label">MAXIMO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" readonly name="stock"
                                    value='{{$consumables->stock}}' required>
                                <label class="form-label">STOCK</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="use" min="0" max="1"
                                    value='{{$consumables->use}}' required>
                                <label class="form-label">EN USO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="enter" required value="0">
                                <label class="form-label">LLEGADA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" max="1" name="replace" required
                                    value="0">
                                <label class="form-label">REEMPLAZO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="recharge" required
                                    value='{{$consumables->recharge}}'>
                                <label class="form-label">RECARGA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" min="0" name="damaged" required
                                    value='{{$consumables->damaged}}'>
                                <label class="form-label">DAÑADO</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    pattern="[A-Z0-9. -ÁÉÍÓU,]{2,255}" name="description"
                                    value='{{$consumables->description}}'>
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