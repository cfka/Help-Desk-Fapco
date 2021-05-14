<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="header">
            <h2>
                ACTIVOS
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
            <div class="row clearfix">
                <div class="col-xs-1 pull-right">
                    <a href="{{asset('/assets/create')}}" role="button" button
                        class="btn btn-block bg-blue waves-effect" type="submit">
                        <i class="material-icons">add</i></a></a>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>NRO</th>
                            <th>EMPRESA</th>
                            <th>FICHA TÉCNICA</th>
                            <th>NRO. ACTIVO</th>
                            <th>TIPO</th>
                            <th>MARCA</th>
                            <th>MODELO</th>
                            {{-- <th>SERIAL</th> --}}
                            {{-- <th>LOCALIZACIÓN</th> --}}
                            <th>USUARIO</th>
                            <th>Editar</th>
                            <th>Historial</th>

                        </tr>
                    </thead>
                    @php
                    $nro=0;
                    @endphp
                    <tbody>
                        @foreach($assets as $asset)
                        @php
                        $nro++;
                        @endphp
                        <tr>
                            <td>{{$nro}}</td>
                            @foreach($companies as $company)
                            @if($asset->company_id == $company->id)
                            <td>{{$company->name}}</td>
                            @endif
                            @endforeach
                            {!!Form::open(['url'=>['hardware'],'method'=>'POST','target'=>'_Blank'])!!}

                            <td><a href="{{asset('/activo/')}}/{{$asset->id}}"
                                    target='_blank'>{{$asset ->datasheet_id}}</a></td>
                            <td>{{$asset ->number}}</td>
                            @foreach($assets_types as $assets_type)
                            @if($asset->assets_type_id == $assets_type->id)
                            <td>{{$assets_type->type}}</td>
                            @endif
                            @endforeach
                            @foreach($brands as $brand)
                            @if($asset->brand_id == $brand->id)
                            <td>{{$brand->name}}</td>
                            @endif
                            @endforeach
                            {{-- <td>{{$asset ->brand_id}}</td> --}}
                            <td>{{$asset ->model}}</td>
                            {{-- <td>{{$asset ->serial}}</td> --}}


                            @foreach($users as $user)
                            @if($asset->user_id == $user->id)
                            <td>{{$user->first_name}} {{$user->last_name}} </td>
                            @endif
                            @endforeach
                            <td>
                                @if($asset->condition!=4)
                                <div class="icon-button-demo">
                                    <a href="{{asset('/assets/')}}/{{$asset->id}}/edit"
                                        class="btn bg-orange waves-effect" type="sumit">
                                        <i class="material-icons">edit</i></a>
                                </div>
                                @endif
                            </td>
                            <td>
                                <div class="icon-button-demo">
                                    <a href="{{asset('/historyassest/')}}/{{$asset->id}}"
                                        class="btn bg-blue waves-effect" type="sumit">
                                        <i class="material-icons">history</i></a>
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