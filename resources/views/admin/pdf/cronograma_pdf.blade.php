
<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <title>CRONOGRAMA </title>
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
                font-size: 11px;
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
            h2{

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
            <td style=" text-align: center;" rowspan="4">CRONOGRAMA DE MANTENIMIENTO PREVENTIVO</td>
            <td style="width: 18%;">Fecha de Revisi&oacute;n</td>
            <td style="width: 14%;text-align: center; ">------</td>
        </tr>
        <tr >
            <td style="width: 18%;  ">Nro. Revisi&oacute;n</td>
            <td style="width: 14%;text-align: center; ">00</td>
        </tr>
        <tr >
            <td style="width: 18%; ">Fecha de aprobaci&oacute;n</td>
            <td style="width: 14%; text-align: center;">11/11/2013</td>
        </tr>
        <tr >
            <td style=" text-align: center;">FORM-INF-04</td>
            <td  >P&aacute;gina:</td>
            <td style="text-align: center; "><p class="page"></p></td>
        </tr>
        </tbody>
    </table>
</div>
<div id="footer">

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 33.3333%; text-align: center;">ASISTENTE/ESPECIALISTA</td>
            <td style="width: 33.3333%; text-align: center;">GERENTE INFORMÁTICA</td>

        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>

        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: center;">{{$data['admin']}}</td>
            <td style="width: 33.3333%; text-align: center;">ING. IBRAHIN GORDON</td>
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
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>FECHA</strong></td>


        </tr>
        <tr>
            <td style="width: 25%; text-align: center;">FAPCO, C.A.</td>
            <td style="width: 25%; text-align: center;">{{$data['fecha']}}</td>
        </tr>
        </tbody>
    </table>
    <p></p>

    <p></p>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>

        <tr>
            <td style="width: 5%; text-align: center;">N°</td>
            <td style="width: 10%; text-align: center;">FICHA TEC. N°</td>
            <td style="width: 21%; text-align: center;">EQUIPO</td>
            <td style="width: 15%; text-align: center;">FECHA</td>
            <td style="width: 26%; text-align: center;">OBSERVACIÓN</td>
        </tr>
        @php
            $count=1;
        @endphp
        @foreach($assets as $asset)

            <tr>
                <td style="width: 5%; text-align: center;">{{$count}}</td>
                <td style="width: 10%; text-align: center;">{{$asset->datasheet_id}}</td>
                @foreach($tipos as $tipo)
                    @if($asset->assets_type_id == $tipo->id)
                        <td style="width: 21%; text-align: center;">{{$tipo->type}}  {{$asset->model}}</td>
                    @endif
                @endforeach
                <td style="width: 15%; text-align: center;">{{$data['fecha_p']}}</td>
                <td style="width: 26%; text-align: center;">@if($plan->type =="1" ) PLANIFICACIÓN MENSUAL @else PLANIFICACIÓN ANUAL @endif</td>
                @php
                    $count=$count+1;
                @endphp
            </tr>
        @endforeach


        </tbody>
    </table>

    <p></p>
    <p></p>
    </div>


</div>
</body>
</html>

