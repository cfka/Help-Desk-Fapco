
<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <title>HARDWARE</title>
    <style type="text/css">
        @page { margin: 150px 40px; }
        #header { position: fixed; left: 0px; top: -130px; right: 0px; height: 100px;  text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px;  }
        #header .page:after { content: counter(page); }
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
    <table style="border-collapse: collapse; width: 100%; " border="1">
        <tbody>
        <tr >
            <td style="width:25%;" rowspan="3" align="center">
                <img src="{{asset('/images')}}/logo.png" width="80"  alt="User" />
            </td>
            <td style=" text-align: center;" rowspan="4">REGISTRO TECNOLÓGICO</td>
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
            <td style=" text-align: center;">FORM-INF-02</td>
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
            <td style="width: 33.3333%; text-align: center;">USUARIO FINAL</td>
            <td style="width: 33.3333%; text-align: center;">GERENTE CECO</td>
            <td style="width: 33.3333%; text-align: center;">GERENTE INFORMÁTICA</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
            <td style="width: 33.3333%; text-align: left;">FIRMA:</td>
        </tr>
        <tr>
            <td style="width: 33.3333%; text-align: left;">NOMBRE:@if ($data['usuario']) {{ $data['usuario'] }} @else N/A @endif </td>
            <td style="width: 33.3333%; text-align: left;">NOMBRE:@if ($data['manager']) {{ $data['manager'] }} @else N/A @endif</td>
            <td style="width: 33.3333%; text-align: left;">NOMBBRE:  IBRAHIN GORDON</td>
        </tr>
        </tbody>
    </table>
</div>

<div id="content">
    <div style= "margin: 1px;" >
        <div style="text-align: center;" class="h2>">HARDWARE</div>
        <br>
        <table style=" width: 100%;" border="1">
            <tbody>
            <tr>
                <td style="width: 25%; text-align: center;font-size: 12px"><strong>UNIDAD DE NEGOCIO</strong></td>
                <td style="width: 25%; text-align: center;font-size: 12px"><strong>FICHA TEC. N°</strong></td>
                <td style="width: 25%; text-align: center;font-size: 12px"><strong>CECO</strong></td>
                <td style="width: 25%; text-align: center;font-size: 12px"><strong>AREA</strong></td>

            </tr>
            <tr>
                <td style="width: 25%; text-align: center;">{{ $data['company'] }}</td>
                <td style="width: 25%; text-align: center;">{{ $asset->datasheet_id}}</td>
                <td style="width: 25%; text-align: center;">{{ $data['ceco'] }}</td>
                <td style="width: 25%; text-align: center;">{{ $data['area'] }}</td>
            </tr>
            </tbody>
        </table>
        <p></p>
        <div style="text-align:left;" class="h2>">1. DESCRIPCIÓN</div>
        <br>
        <table style="border-collapse: collapse; width: 100%;" border="1">
            <tbody>
            <tr>
                <td style="width: 33.3333%;  text-align: left;" colspan="3">Codigo de activo fijo: @if($asset->number){{ $asset->number }}@else N/A @endif</td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;" colspan="3">Tipo de equipo:  {{ $data['tipo'] }}</td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Marca: {{ $data['marca'] }}</td>
                <td style="width: 33.3333%; text-align: left;">Modelo: {{ $asset->model }}</td>
                <td style="width: 33.3333%; text-align: left;">Serial: {{ $asset->serial }}</td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;"colspan="3">Ubicación: @if($asset['location']){{ $asset->location }} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 50%; text-align: left;"colspan="2">Periodo de Garantia: @if($data['garantia']){{ $data['garantia'] }} @else N/A @endif </td>
                <td style="width: 50%; text-align: left;">Termino de Garantia: @if($data['fecha_fing']){{ $data['fecha_fing'] }} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;"colspan="3">Condición: @if($data['condition']){{ $data['condition'] }} @else N/A @endif </td>
            </tr>

            </tbody>
        </table>
        <p></p>
        <div style="text-align:left;" class="h2>">2. ESPECIFICACIONES TÉCNICAS</div>
        <br>



        <table style="border-collapse: collapse; width: 100%;" border="1">
            <tbody>
            <tr>
                <td style="width: 33.3333%; text-align: left;"colspan="2">Placa base: @if($asset['motherboard']){{ $asset->motherboard}} @else N/A @endif  </td>
                <td style="width: 33.3333%; text-align: left;">Procesador:@if($asset['processor']) {{ $asset->processor}} @else N/A @endif  </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;"colspan="2">Memoria Ram:  @if($asset['RAM']) {{ $asset->RAM}}@else N/A @endif  </td>
                <td style="width: 33.3333%; text-align: left;">Disco Duro: @if($asset['HDD']){{ $asset->HDD}}@else N/A @endif  </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;"colspan="2">Unidad de CD-DVD: @if($asset['CDDVD']){{ $asset->CDDVD}}@else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Floppy: @if($asset['floppy']){{ $asset->floppy}} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;"colspan="2">Sistema Operativo: {{ $data['software']}}     </td>
                <td style="width: 33.3333%; text-align: left;">Otro periférico:  @if ($asset['other_peripheral']){{ $asset['other_peripheral']}} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Teclado: @if ($data['tmarca']){{ $data['tmarca']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Modelo: @if ($data['tmodelo']){{ $data['tmodelo']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Serial: @if ($data['tserial']){{ $data['tserial']}} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Mouse: @if ($data['mmarca']){{ $data['mmarca']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Modelo: @if ($data['mmodelo']){{ $data['mmodelo']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Serial: @if ($data['mserial']){{ $data['mserial']}} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Reg/UPS: @if ($data['rmarca']){{ $data['rmarca']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Modelo: @if ($data['rmodelo']){{ $data['rmodelo']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Serial: @if ($data['rserial']){{ $data['rserial']}} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 33.3333%; text-align: left;">Otro: @if ($data['omarca']){{ $data['omarca']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Modelo: @if ($data['omodelo']){{ $data['omodelo']}} @else N/A @endif </td>
                <td style="width: 33.3333%; text-align: left;">Serial: @if ($data['oserial']){{ $data['oserial']}} @else N/A @endif </td>
            </tr>

            </tbody>
        </table>
        <p></p>
        <div style="text-align:left;" class="h2>">3. ADQUISICIÓN</div>
        <br>
        <table style="border-collapse: collapse; width: 100%;" border="1">
            <tbody>
            <tr>
                <td style="width: 50%;  text-align: left;" >Fecha de Compra:  @if ($data['fecha_com']){{ $data['fecha_com'] }} @else N/A @endif </td>
                <td style="width: 50%;  text-align: left;" >Pedido/OC:   @if ($asset['nro_order']){{ $asset->nro_order }} @else N/A @endif </td>
            </tr>
            <tr>
                <td style="width: 50%;  text-align: left;" >Proveedor:  @if ($data['proveedor']){{ $data['proveedor']}} @else N/A @endif </td>
                <td style="width: 50%;  text-align: left;" >Costo:   @if ($asset['cost']){{ $asset->cost }} @else N/A @endif </td>
            </tr>
            </tbody>
        </table>
        <p></p>
        <div style="text-align:left;" class="h2>">4. RESPONSABLE</div>
        <br>
        <table style="border-collapse: collapse; width: 100%; " border="1">
            <tbody>
            <tr>
                <td style="width: 50%;  text-align: left;"colspan="2" >Responsable de instalación:@if ($data['instalado']) {{ $data['instalado'] }} @else N/A @endif</td>

            </tr>
            <tr>
                <td style="width: 50%;  text-align: left;" >Fecha de instalación: @if ($data['fechainstal']) {{ $data['fechainstal'] }} @else N/A @endif</td>
                <td style="width: 50%;  text-align: left;">Fecha de operación: @if ($data['fechaoper']) {{ $data['fechaoper'] }} @else N/A @endif</td>
            </tr>
            <tr>
                <td style="width: 50%;  text-align: left;"colspan="2" >Supervisado por: @if ($data['supervisado']) {{ $data['supervisado'] }} @else N/A @endif</td>

            </tr>
            <tr>
                <td style="width: 35%;  text-align: left;" >Documento elaborado y almacenado por:</td>
                <td style="width: 65%;  text-align: left;" >@if ($data['instalado']) {{ $data['instalado'] }} @else N/A @endif</td>
            </tr>
            </tbody>
        </table>

    </div>


</div>
</body>
</html>

