<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="header">
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
                    <a href="{{asset('/peripheral/create')}}" role="button" button class="btn btn-block bg-blue waves-effect" type="submit">
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
                        <th>MARCA</th>
                        <th>TIPO</th>
                        <th>MODELO</th>
                        <th>SERIAL</th>
                        <th>OPERATIVO</th>
                        <th>ASIGNADO</th>
                        <th></th>
                    </tr>
                    </thead>
                        @php
                            $nro=0;
                        @endphp
                    <tbody>
                    @foreach($peripherals as $peripheral)
                        <tr>
                            @php
                            $nro++;
                            @endphp

                            {{-- <td><a href="{{asset('/peripheral/')}}/{{$peripheral->id}}" >{{$peripheral->id}}</a></td> --}}
                            @foreach($brands as $brand)
                                @if($peripheral->brands_id == $brand->id)
                                 <td>{{$brand->name}}</td>
                                @endif
                            @endforeach

                              
                            <td>{{$peripheral->type}}</td>
                                
                            
                            <td>{{$peripheral->model}}</td>
                            <td>{{$peripheral->serial}}</td>
                            <td>{{$peripheral->operational}}</td>
                            <td>{{$peripheral->assigned}}</td>

                            <td>
                                <div class="icon-button-demo">
                                    <a href="{{asset('/peripheral/')}}/{{$peripheral->id}}/edit"  class="btn bg-orange waves-effect" type="sumit">
                                        <i class="material-icons">edit</i></a>
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
<!-- #END# Basic Examples -->



