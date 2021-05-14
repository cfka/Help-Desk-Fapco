
<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <title>INDICADORES DE GESTIÓN</title>
        <style type="text/css">
            @page { margin: 170px 40px; }
            #header { position: fixed; left: 0px; top: -130px; right: 0px; height: 100px;  text-align: center; }
            #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 120px;  }
            #header .page:after { content: counter(page); }
            body {
                margin: 7mm 0mm 0mm 0mm;
                font-size: 16px;
                font-family: Arial;
            }

            table{
                border-collapse: collapse;
            }
            td,th,tr {
                padding: 5px 4px;
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
    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
        <tr >
            <td style="width:25%;" rowspan="3" align="center">
                    <img src="{{asset('/images')}}/logo.png" width="80"  alt="User" />
            </td>
            <td style=" text-align: center;" rowspan="4">INDICADORES DE GESTIÓN</td>
            <td style="width: 18%;">Fecha de Revisi&oacute;n</td>
            <td style="width: 14%;text-align: center; ">------</td>
        </tr>
        <tr >
            <td style="width: 18%;  ">Nro. Revisi&oacute;n</td>
            <td style="width: 14%;text-align: center; ">00</td>
        </tr>
        <tr >
            <td style="width: 18%; ">Fecha de aprobaci&oacute;n</td>
            <td style="width: 14%; text-align: center;">05/03/2015</td>
        </tr>
        <tr >
            <td style=" text-align: center;">FORM-INF-06</td>
            <td  >P&aacute;gina:</td>
            <td style="text-align: center; "><p class="page">Pág. </p></td>
        </tr>
        </tbody>
    </table>
</div>
<div id="footer">

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%; text-align: center;">REALIZADO POR:</td>
            <td style="width: 33.3333%; text-align: center;">REVISADO POR:</td>
            <td style="width: 33.3333%; text-align: center;">APROBADO POR:</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: center;">{{ $data['admin'] }}</td>
            <td style="width: 33.3333%; text-align: center;">ING. HECTOR MOTA </td>
            <td style="width: 33.3333%; text-align: center;">ING.IBRAHIN GORDON</td>
        </tr>
        </tbody>
    </table>
</div>
<div id="content">
<div style= "margin: 1px;" >



    <table style=" width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>UNIDAD DE NEGOCIO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>CECO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>FECHA</strong></td>

        </tr>
        <tr>
            <td style="width: 25%; text-align: center;">FAPCO, C.A.</td>
            <td style="width: 25%; text-align: center;"></td>
            <td style="width: 25%; text-align: center;">{{ $data['fechav'] }}</td>
        </tr>
        </tbody>
    </table>
    <p></p>

    <p></p>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%;  text-align: center;" colspan="2">Estadísticas del mantenimiento preventivo de software aplicado </td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Cantidad de elementos de hardware: </td>
            <td style="width: 33.3333%; text-align: center;">{{ $data['mpp'] }} </td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Cantidad de mantenimiento planificados (MPP) </td>
            <td style="width: 33.3333%; text-align: center;">{{ $data['mpp'] }} </td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Cantidad de mantenimiento realizados (MPR) </td>
            <td style="width: 33.3333%; text-align: center;"> {{ $data['mpr'] }}</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Cantidad de mantenimiento no realizados </td>
            <td style="width: 33.3333%; text-align: center;">{{$data['mpnor']}} </td>
        </tr>

        </tbody>
    </table>

    <p></p>

    @if($data['indicador']== 'ESTABLE')
        @php
            $background='background-color:green';
        @endphp
    @else
        @if($data['indicador']== 'FUERA DE CONTROL')
            @php
                $background='background-color:yellow';
            @endphp
        @else
            @if($data['indicador']== 'CRITÍCO')
                @php
                    $background='background-color:red';
                @endphp
            @endif
        @endif
    @endif


    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%;  text-align: center;" colspan="2">Cálculo porcentual de efectividad del mantenimiento preventivo de software</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Fórmula para el cálculo: </td>
            <td style="width: 33.3333%; text-align: center;"> EPM=(MPR/MPP)x 100</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Resultado del cálculo: </td>
            <td style="width: 33.3333%; text-align: center;">{{$data['calculo']}}% </td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Resultado del indicador: </td>
            <td style="width: 33.3333%; text-align: center;{{$background}};">{{$data['indicador']}} </td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
            <tr>
                <td style="width: 33.3333%;  text-align: left;" ><u>Causas de incumplimiento:</u> N/A</td>
                <p></p>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;"><u>Acciones Correctivas:</u> N/A </td>
            </tr>
        </tbody>
    </table>
    <p></p>

    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
            <tr >
             <td>Seguimiento y Control del Indicador</td>
            </tr>
        </tbody>
    </table>

    <p></p>

    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
            <tr >
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;text-align: center;  ">{{$data['calculo']}}%</td>
            </tr>
            <tr >
                <td style="width: 33%;  ">Año</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;  ">Resultado</td>
                <td style="width: 33%;text-align: center;  ">{{$data['anno']}}</td>
            </tr>
        </tbody>
    </table>
    <p></p>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%;  text-align: center;" colspan="3">Consideraciones de Gestión (INDICADOR - SEMAFORO - META)</td>

        </tr>
        <tr>
            <td style="width: 35%; text-align: left;">Indicador Estable: </td>
            <td style="width: 30%; text-align: center; background-color:green;"> VERDE</td>
            <td style="width: 35%; text-align: center;"> EPM>=90%</td>
        </tr>
        <tr>
            <td style="width: 35%; text-align: left;">Indicador Fuera de Control: </td>
            <td style="width: 30%; text-align: center;background-color:yellow;"> AMARILLO</td>
            <td style="width: 35%; text-align: center;"> 60%>EPM<90% </td>
        </tr>
        <tr>
            <td style="width: 35%; text-align: left;">Indicador Crítico: </td>
            <td style="width: 30%; text-align: center;background-color:red;"> ROJO</td>
            <td style="width: 35%; text-align: center;"> EPM<60% </td>
        </tr>
        </tbody>
    </table>
    <br>

    <hr>

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
            <tr>
                <td style="width: 33.3333%;  text-align: center;" colspan="2" >Estadísticas de satisfacción de usuario en cuanto al mantenimiento preventivo de software aplicado </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Cantidad de usuarios </td>
                <td style="width: 33.3333%; text-align: center;">{{ $data['mpp'] }} </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Cantidad de mantenimiento realizados (CMR) </td>
                <td style="width: 33.3333%; text-align: center;">{{ $data['mpr'] }} </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Cantidad de mantenimiento conformes (CMC) </td>
                <td style="width: 33.3333%; text-align: center;"> {{$data['cmc']}}</td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Cantidad de mantenimiento no conformes: </td>
                <td style="width: 33.3333%; text-align: center;">{{$data['cmnoc']}} </td>
            </tr>
        </tbody>
    </table>
    <p></p>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%;  text-align: left;" ><u>Causas de incumplimiento:</u> N/A</td>
            <p></p>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;"><u>Acciones Correctivas:</u> N/A </td>
        </tr>
        </tbody>
    </table>
    <p></p>


    @if($data['indicador2']== 'ESTABLE')
        @php
            $background1='background-color:green';
        @endphp
    @else
        @if($data['indicador2']== 'FUERA DE CONTROL')
            @php
                $background1='background-color:yellow';
            @endphp
        @else
            @if($data['indicador2']== 'CRITÍCO')
                @php
                    $background1='background-color:red';
                @endphp
            @endif
        @endif
    @endif

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%;  text-align: center;" colspan="2">Cálculo porcentual de satisfacción de usuarios </td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Fórmula para el cálculo: </td>
            <td style="width: 33.3333%; text-align: center;"> NSU=(CMC/CMR)x 100</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Resultado del cálculo: </td>
            <td style="width: 33.3333%; text-align: center;">{{$data['conforme']}}% </td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Resultado del indicador: </td>
            <td style="width: 33.3333%; text-align: center;{{$background1}};"> {{$data['indicador2']}}</td>
        </tr>
        </tbody>
    </table>
<p></p>

    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
        <tr >
            <td>Seguimiento y Control del Indicador</td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
        <tr >
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%; text-align: center;">{{$data['conforme']}}% </td>
        </tr>
        <tr >
            <td style="width: 33%;  ">Año</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%;  ">Resultado</td>
            <td style="width: 33%; text-align: center; ">{{$data['anno']}} </td>
        </tr>
        </tbody>
    </table>
    <p></p>

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style=" text-align: center;" colspan="3">Consideraciones de Gestión (INDICADOR - SEMAFORO - META)</td>

        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Indicador Estable: </td>
            <td style="width: 33.3333%; text-align: center;background-color:green"> VERDE</td>
            <td style="width: 33.3333%; text-align: center;"> EPM>=90%</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Indicador Fuera de Control: </td>
            <td style="width: 33.3333%; text-align: center;background-color: yellow"> AMARILLO</td>
            <td style="width: 33.3333%; text-align: center;"> 60%>EPM<90%</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">Indicador Crítico: </td>
            <td style="width: 33.3333%; text-align: center;background-color:red"> ROJO</td>
            <td style="width: 33.3333%; text-align: center;"> EPM<60%</td>
        </tr>
        </tbody>
    </table>
</div>


</div>
</body>
</html>

