
<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <title>INVENTARIO TECNOLOGICO</title>



    <title>BOLETA DE VENTA</title>
    <style type="text/css">
        @page { margin: 180px 50px; }
        #header { position: fixed; left: 0px; top: -130px; right: 0px; height: 150px;  text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 100px;  }
        #footer .page:after { content: counter(page, upper-roman); }

        body{
            font-size: 16px;
            font-family: Arial;
        }
        table{
            border-collapse: collapse;
        }
        td,th {
            padding: 6px 5px;
            font-size: 12px;
            font-weight: bold;
        }
        .h1{
            font-size: 21px;
            font-weight: bold;
        }
        .h2{
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }
        .tabla1{
            margin-bottom: 20px;
        }
        .tabla2 {
            margin-bottom: 20px;
        }
        .tabla3{
            margin-top: 15px;
        }
        .tabla3 td{
            border: 1px solid #000;
        }
        .tabla3 .cancelado{
            border-left: 0;
            border-right: 0;
            border-bottom: 0;
            border-top: 1px dotted #000;
            width: 200px;
        }
        .emisor{
            color: red;
        }
        .linea{
            border-bottom: 1px dotted #000;
        }
        .border{
            border: 1px solid #000;
        }
        .fondo{
            background-color: #dfdfdf;
        }
        .fisico{
            color: #fff;
        }
        .fisico td{
            color: #fff;
        }
        .fisico .border{
            border: 1px solid #fff;
        }
        .fisico .tabla3 td{
            border: 1px solid #fff;
        }
        .fisico .linea{
            border-bottom: 1px dotted #fff;
        }
        .fisico .emisor{
            color: #fff;
        }
        .fisico .tabla3 .cancelado{
            border-top: 1px dotted #fff;
        }
        .fisico .text{
            color: #000;
        }
        .fisico .fondo{
            background-color: #fff;
        }

    </style>



</head>
<body>
<div id="header">
    <table style="border-collapse: collapse; width: 100%; height: 90px;" border="1">
        <tbody>
        <tr >
            <td style="width:25%;" rowspan="3">fff</td>
            <td style="height: 90px; text-align: center;" rowspan="4">CRONOGRAMA DE MANTENIMIENTO PREVENTIVO</td>
            <td style="width: 18%;">Fecha de Revisi&oacute;n</td>
            <td style="width: 14%; ">2018/05/15</td>
        </tr>
        <tr >
            <td style="width: 18%;  ">Nro. Revisi&oacute;n</td>
            <td style="width: 14%; "></td>
        </tr>
        <tr >
            <td style="width: 18%; ">Fecha de aprobaci&oacute;n</td>
            <td style="width: 14%; "></td>
        </tr>
        <tr >
            <td style=" height: 18px; text-align: center;">FORM-INF-01</td>
            <td style="width: 18%; ">P&aacute;gina:</td>
            <td style="width: 14%; "></td>
        </tr>
        </tbody>
    </table>
</div>
<div style= "margin: 1px;" >
    <table style=" width: 100%;" border="1">
        <tbody>
        <tr>
            <td style="width: 40%; text-align: center;font-size: 12px"><strong>UNIDAD DE NEGOCIO</strong></td>
            <td style="width: 30%; text-align: center;font-size: 12px"><strong>CECO</strong></td>
            <td style="width: 30%; text-align: center;font-size: 12px"><strong>FECHA</strong></td>
        </tr>
        <tr>
            <td style="width: 40%;"></td>
            <td style="width: 30%;"></td>
            <td style="width: 30%;"></td>

        </tr>
        </tbody>
    </table>
    <p></p>

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <thead>
        <tr style="text-align: center;">
            <td style="width: 5%; ">
                <h4>N&deg;</h4>
            </td>
            <td style="width: 15%; ">
                <h4>FICHA TEC. N&deg;</h4>
            </td>
            <td style="width: 35%; ">
                <h4>EQUIPO</h4>
            </td>
            <td style="width: 20%; ">
                <h4>FECHA</h4>
            </td>
            <td style="width: 25%; ">
                <h4>OBSERVACIÓN</h4>
            </td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 15%;"></td>
            <td style="width: 35%;"></td>
            <td style="width: 20%;"></td>
            <td style="width: 25%;"></td>

        </tr>
        </tbody>
    </table>

    <p>&nbsp;</p>
    <div id="footer">
        <table style="border-collapse: collapse; width: 100%;" border="1">
            <tbody>
            <tr>
                <td style="width: 50%; text-align: center;">ASISTENTE ESPECIALISTA</td>
                <td style="width: 50%; text-align: center;">GERENTE INFORMÁTICA:</td>

            </tr>
            <tr>
                <td style="width: 50%; text-align: left;">FIRMA</td>
                <td style="width: 50%; text-align: left;">NOMBRE</td>

            </tr>
            <tr>
                <td style="width: 50%; text-align: left;">FIRMA</td>
                <td style="width: 50%; text-align: left;">NOMBRE</td>

            </tr>
            </tbody>
        </table>
    </div>

</div>

</body>



</html>

