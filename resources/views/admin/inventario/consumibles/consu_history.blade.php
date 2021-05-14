@extends('layout.master')
@section('title','Nuevo Consumible')
@section('content')
<div class="block-header">

    <h2>
        INVENTARIO
    </h2>

</div>
@include('messages.validacion')

<!-- input readonly-->
@foreach($consumable_historys as $consumable_history)
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <h2>MODIFICACIÓN {{$consumable_history->created_at}}</h2>
            </div>
            <div class="body">

                <div class="row clearfix">
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                @foreach($users as $user)
                                @if($user->id == $consumable_history->user_id)
                                <input type="text" class="form-control" readonly value='{{$user->name}}'>
                                <label class="form-label">USUARIO</label>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                @foreach($assets as $asset)
                                @if($asset->id == $consumable_history->assets_id)
                                <input type="text" class="form-control" readonly value='{{$asset->model}}'>
                                <label class="form-label">ACTIVO</label>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                @if($consumable_history->type == "CARTUCHO")
                                <input type="text" class="form-control" readonly value="CARTUCHO">
                                @elseif($consumable_history->type == "TONER")
                                <input type="text" class="form-control" readonly value="TONER">
                                @elseif($consumable_history->type == "CINTA")
                                <input type="text" class="form-control" readonly value="CINTA">
                                @elseif($consumable_history->type == "TINTA")
                                <input type="text" class="form-control" readonly value="TINTA">
                                @endif
                                <label class="form-label">CONDICION</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                @foreach($brands as $brand)
                                @if($brand->id == $consumable_history->brand_id)
                                <input type="text" class="form-control" readonly value='{{$brand->name}}'>
                                <label class="form-label">MARCA</label>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="text" class="form-control" style="text-transform:uppercase;"
                                    name="model" value='{{$consumable_history->model}}'>
                                <label class="form-label">MODELO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" readonly class="form-control" name="min"
                                    value='{{$consumable_history->min}}'>
                                <label class="form-label">MINIMO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="max"
                                    value='{{$consumable_history->max}}'>
                                <label class="form-label">MAXIMO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="stock"
                                    value='{{$consumable_history->stock}}'>
                                <label class="form-label">STOCK</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="use"
                                    value='{{$consumable_history->use}}'>
                                <label class="form-label">USO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="recharge"
                                    value='{{$consumable_history->recharge}}'>
                                <label class="form-label">RECARGA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="damaged"
                                    value='{{$consumable_history->damaged}}'>
                                <label class="form-label">DAÑADO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="enter"
                                    value='{{$consumable_history->enter}}'>
                                <label class="form-label">LLEGADA</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="number" class="form-control" name="replace"
                                    value='{{$consumable_history->replace}}'>
                                <label class="form-label">REEMPLAZO</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input readonly type="text" class="form-control" style="text-transform:uppercase;"
                                    name="description" value='{{$consumable_history->description}}'>
                                <label class="form-label">DESCRIPCION</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-5">
                        <div class="form-group form-float">
                            <div class="form-line">
                                @foreach($admins as $admin)
                                @if($admin->id==$consumable_history->document)
                                <input readonly type="text" class="form-control" readonly
                                    value='{{$admin->first_name}} {{$admin->last_name}}'>
                                @endif
                                @endforeach
                                <label class="form-label">DOCUMENTO ALMACENADO Y ELABORADO POR: </label>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="icon-button-demo">



                    <a href="{{asset('/consumables/')}}" class="btn btn-success waves-effect" type="sumit">
                        <i class="material-icons"></i>Volver
                        Atrás</a>

                </div>
            </div>

        </div>

    </div>
</div>
@endforeach
@endsection
@section('scripts')
{!! Html::script('plugins/jquery-input readonlymask/jquery.input readonlymask.bundle.js') !!}
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