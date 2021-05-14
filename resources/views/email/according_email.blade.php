<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
</head>
<body >

<div>
    <p>Estimado usuario <strong>{!! $name !!}</strong>.  Se le notifica por medio del presente que el status de su ticket #{!! $id !!} ha cambiado.</p>
    <p> El nuevo estado es: {!! $status !!}</p>
    <p> Las actividades realizadas son: {!! $solution !!}</p>
    <p>Por favor ingresar a http://localhost/helpdesk/public/according/{!! $id!!}/{!! $key !!} para realizar la conformidad del ticket.</p>
    <p> Comuníquese con el administrador del ticket para cualquier información adicional: {!! $admin !!}</p>

</div>

</body>

</html>