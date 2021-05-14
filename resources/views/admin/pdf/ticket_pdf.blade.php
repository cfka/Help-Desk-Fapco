
<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <title>INFORME DE SOPORTE</title>
        <style type="text/css">
            @page { margin: 170px 40px; }
            #header { position: fixed; left: 0px; top: -130px; right: 0px; height: 100px;  text-align: center; }
            #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 120px;  }
            #header .page:after { content: counter(page); }
            body {
                margin: 7mm 0mm 0mm 0mm;
                font-size: 14px;
                font-family: Arial;
            }
            body {
                margin: 7mm 0mm 0mm 0mm;
                font-size: 14px;
                font-family: Arial;
                font-weight: bold;
            }

            table{
                border-collapse: collapse;
            }
            td,th,tr {
                padding: 3px 4px;
                font-size: 12px;
                font-weight: bold;
            }
            hr {
                page-break-after: always;
                border: 0;
                margin: 0;
                padding: 0;
            }
            .h1{
                font-size: 21px;
                font-weight: bold;
            }
            .h2{

                font-weight: bold;

            }
        </style>
</head>
<body>

<script type="text/php">
    @if (isset($pdf))
        @php
            $font = Font_Metrics::get_font("Arial", "bold");
            $pdf->page_text(765, 550, "Pagina {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0, 0, 0));
        @endphp
    @endif
</script>
<div id="header">
    <table style="border-collapse: collapse; width: 100%; height: 90px;" border="1">
        <tbody>
        <tr >
            <td style="width:25%;" rowspan="3" align="center"> <div class="image">
                    <img src="{{asset('/images')}}/logo.png" width="110" height="80" alt="User" />
                </div></td>
            <td style="height: 90px; text-align: center;" rowspan="4">INFORME DE SOPORTE TECNICO</td>
            <td style="width: 18%;">Fecha de Revisi&oacute;n</td>
            <td style="width: 14%;text-align: center; ">2018/05/15</td>
        </tr>
        <tr >
            <td style="width: 18%;  ">Nro. Revisi&oacute;n</td>
            <td style="width: 14%;text-align: center; ">01</td>
        </tr>
        <tr >
            <td style="width: 18%; ">Fecha de aprobaci&oacute;n</td>
            <td style="width: 14%; text-align: center;">11/11/2013</td>
        </tr>
        <tr >
            <td style=" height: 18px; text-align: center;">FORM-INF-03</td>
            <td style="width: 18%; ">P&aacute;gina:</td>
            <td style="text-align: center; "><p class="page">Pág. </p></td>
        </tr>
        </tbody>
    </table>
</div>
<div id="footer">
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%; text-align: center;">USUARIO FINAL</td>
            <td style="width: 33.3333%; text-align: center;">ASISTENTE ESPECIALISTA</td>
            <td style="width: 33.3333%; text-align: center;">GERENTE INFORMÁTICA</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">NOMBRE:  {!!$data['usuario']  !!}</td>
            <td style="width: 33.3333%; text-align: left;">NOMBRE:  {!!$data['admin']  !!}</td>
            <td style="width: 33.3333%; text-align: left;">NOMBRE:  IBRAHIN GORDON</td>
        </tr>
        </tbody>
    </table>
</div>

<div style= "margin: 1px;" >

<div class="h2>"><center><h2>INFORME</h2></center></div>

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%; text-align: left;">FECHA DE VISITA: {!! $data['fechav'] !!}</td>
            <td style="width: 33.3333%; text-align: left;">HORA DE SALIDA: @if($data['compania'] ===2 ) 4:00 pm @else N/A @endif</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">HORA DE LLEGADA:  @if($data['compania']===2 ) 6:00 am @else N/A @endif</td>
            <td style="width: 33.3333%; text-align: left;">TIEMPO DE TRASLADO: @if($data['compania']===2 ) 2 HORAS @else N/A @endif</td>
        </tr>
        </tbody>
    </table>

    <p></p>

    <table style=" width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>UNIDAD DE NEGOCIO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>CECO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>CASO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>AREA</strong></td>
        </tr>
        <tr>
            <td style="width: 25%; text-align: center;">FAPCO, C.A.</td>
            <td style="width: 25%; text-align: center;">{{ $data['ceco'] }}</td>
            <td style="width: 25%; text-align: center;">{{ $data['caso'] }}</td>
            <td style="width: 25%; text-align: center;">{!!$data['localizacion']  !!}</td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <div class="h2>">1. MOTIVO DE LA VISITA</div>

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%; text-align: left;">PREVENTIVA : @if($data['preve']) <img src="{{asset('/images')}}/radioyes.png" width="15" height="15" alt="User" /> </td> @else <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />@endif
            <td style="width: 33.3333%; text-align: left;">CORRECTIVA : @if($data['correc']) <img src="{{asset('/images')}}/radioyes.png" width="15" height="15" alt="User" /> </td> @else <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />@endif
            <td style="width: 33.3333%; text-align: left;">OTRO : <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />
        </tr>

        </tbody>
    </table>
    <p></p>
    <div class="h2>">2. ESPECIFICACIONES TECNICAS - DIAGNÓSTICO</div>

    <table style="border-collapse: collapse; width: 100%; height: 90px;" border="1">
        <tbody>
        <tr >
            <td style="width: 33%;  ">EQUIPO: {{ $data['equipo'] }}</td>
            <td style="width: 33%;  ">MODELO: {{ $data['modelo'] }}</td>
            <td style="width: 33%;  ">SERIAL: {{ $data['serial'] }}</td>

        </tr>
        <tr >
            <td style="width:100%;" colspan="3" >SISTEMA OPERATIVO :{{ $data['so'] }}</td>
        </tr>
        <tr >
            <td style="width:100%;" colspan="3" >DIAGNÓSTICO:</td>
        </tr>
        <tr >
            <td style="width:100%; text-align: center;" colspan="3"> {!! $data['diagnostico'] !!} </td>
        </tr>

        </tbody>
    </table>
    <p></p>
    <div class="h2>">3. ACTIVIDADES REALIZADAS</div>
    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
            <tr >
                <td style="width: 33%;  ">EN PROCESO:@if($data['proceso']) <img src="{{asset('/images')}}/radioyes.png" width="15" height="15" alt="User" /> </td> @else <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />@endif
                <td style="width: 33%;  ">PENDIENTE: @if($data['pendiente']) <img src="{{asset('/images')}}/radioyes.png" width="15" height="15" alt="User" /> </td>@else <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />@endif
                <td style="width: 33%;  ">CULMINADA: @if($data['culminada'])  <img src="{{asset('/images')}}/radioyes.png" width="15" height="15" alt="User" /> </td>@else<img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" /> @endif

            </tr>
            <tr >
                @if($solus === 'N/A')
                    <td style="width:100%; text-align: center;" colspan="3" >{{$solus}}</td>
                @else
                    @foreach($solus   as $solu)
                        <td style="width:100%; text-align: center;" colspan="3" >{{$solu->description}}</td>
                    @endforeach
                @endif

            </tr>
        </tbody>
    </table>
    <p></p>
    <div class="h2>">4. RECURSOS Y MATERIALES</div>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%; text-align: left;">REPUESTOS Y/O MATERIALES UTILIZADOS</td>
            <td style="width: 33.3333%; text-align: left;">REPUESTOS Y/O MATERIALES PEDIDOS</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: center;">N/A</td>
            <td style="width: 33.3333%; text-align: center;">N/A</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: center;">N/A</td>
            <td style="width: 33.3333%; text-align: center;">N/A</td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <div class="h2>">4. CONFORMIDAD DEL SERVICIO</div>

    <table style="border-collapse: collapse; width: 100%; height: 90px;" border="1">
        <tbody>

        <tr >
            <td style="width:100%;" colspan="2" >CONFORME: SI @if($data['conformidad']=== 1)  <img src="{{asset('/images')}}/radioyes.png" width="15" height="15" alt="User" />  @else <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" /> @endif NO @if($data['conformidad']===2)  <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />  @else        <img src="{{asset('/images')}}/radio.png" width="15" height="15" alt="User" />  @endif</td>
        </tr>
        <tr >
            <td style="width: 50%;  ">NOMBRE DEL USUARIO: {!!$data['usuario']  !!}</td>
            <td style="width: 50%;  ">ÁREA: {!!$data['localizacion']  !!}</td>


        </tr>
        <tr >
            <td style="width:100%;" colspan="2" >OBSERVACIONES:</td>
        </tr>
        <tr >
            <td style="width:100%; text-align: center;" colspan="2" >{!!$data['observacion']  !!}</td>
        </tr>
        </tbody>
    </table>

</div>


</body>



</html>

