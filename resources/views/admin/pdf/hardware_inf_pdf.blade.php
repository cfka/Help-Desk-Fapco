
<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <title>INVENTARIO TECNOLOGICO</title>
        <style type="text/css">
            @page { margin: 170px 40px; }
            #header { position: fixed; left: 0px; top: -130px; right: 0px; height: 100px;  text-align: center; }
            #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 120px;  }
            #header .page:after { content: counter(page); }
            body {
                margin: 38mm 0mm 0mm 0mm;
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
            <td style=" text-align: center;" rowspan="4">INVENTARIO TECNOLÓGICO</td>
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
            <td style=" text-align: center;">FORM-INF-01</td>
            <td  >P&aacute;gina:</td>
            <td style="text-align: center; "><p class="page">Pág. </p></td>
        </tr>
        </tbody>
    </table>
    <br>
    
    <div style="text-align: center;" class="h2>">HARDWARE</div>
    

    <table style=" width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>UNIDAD DE NEGOCIO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>CECO</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>AREA</strong></td>
            <td style="width: 25%; text-align: center;font-size: 12px"><strong>FECHA</strong></td>


        </tr>
        <tr>
            <td style="width: 25%; text-align: center;">{{$data['company']}}</td>
            <td style="width: 25%; text-align: center;">N/A</td>
            <td style="width: 25%; text-align: center;">N/A</td>
            <td style="width: 25%; text-align: center;">{{$data['fecha']}}</td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <table style=" width: 100%;" border="1">
            <tbody>

                    <tr>
                            <td style="width: 10%; text-align: center;">N°</td>
                            <td style="width: 20%; text-align: center;">FICHA TEC. N°</td>
                            <td style="width: 21%; text-align: center;">N° ACTIVO FIJO</td>
                            <td style="width: 21%; text-align: center;">CECO</td>
                            <td style="width: 21%; text-align: center;">MARCA</td>
                            <td style="width: 33.3333%; text-align: center;">MODELO</td>
                            <td style="width: 33.3333%; text-align: center;">SERIAL</td>
                            <td style="width: 33.3333%; text-align: center;">OTRA INFORMACIÓN</td>
                        </tr>
            </tbody>
        </table>
    <p></p>
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
            {{-- <td style="width: 33.3333%; text-align: center;">{{$data['admin']}}</td> --}}
            <td style="width: 33.3333%; text-align: center;">                   </td>
            <td style="width: 33.3333%; text-align: center;">                   </td>
            <td style="width: 33.3333%; text-align: center;">ING. IBRAHIN GORDON</td>
        </tr>
        </tbody>
    </table>
</div>
<div id="content">
<div >

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>

        @php
            $count=1;
        @endphp
       @for($i=0; $i < count($activos); $i++)
            <tr>
                <td style="width: 10%; text-align: center;">{{$count}}</td>
                <td style="width: 20%; text-align: center;">{{$activos[$i]->datasheet_id}}</td>
                <td style="width: 21%; text-align: center;">{{$activos[$i]->number}}</td>
                @foreach($cecos as $ceco)
                    @if($activos[$i]->ceco_id == $ceco->id)
                        <td style="width: 21%; text-align: center;">{{$ceco->number}}</td>

                    @endif
                @endforeach
                @foreach($brands as $brand)
                    @if($activos[$i]->brand_id == $brand->id)
                        <td style="width: 21%; text-align: center;">{{$brand->name}}</td>

                    @endif
                @endforeach
                @if($activos[$i]->model)
                    <td style="width: 33.3333%; text-align: center;">{{$activos[$i]->model}}</td>
                @else
                    <td style="width: 33.3333%; text-align: center;">N/A</td>
                @endif
                <td style="width: 33.3333%; text-align: center;">{{$activos[$i]->serial}}</td>
                @foreach($users as $user)
                    @if($activos[$i]->user_id == $user->id)
                        <td style="width: 33.3333%; text-align: center;">{{$activos[$i]->location}}</td>
                    @endif
                @endforeach
                @php
                    $count=$count+1;
                @endphp
            </tr>

       @endfor
        </tbody>
    </table>

    <p></p>
    <p></p>
    </div>


</div>
</body>
</html>

