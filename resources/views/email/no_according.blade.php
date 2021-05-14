<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
</head>
<body >

<div>
    <p>Estimado <strong>{!! $admin !!}</strong>.  Se le notifica por medio del presente que el usuario del ticket #{!! $id !!} ha indicado no estar conforme con el servicio recibido.</p>
    <p> El motivo de la no conformidad es: {!! $a_reason !!}</p>
    <p> El caso fue abierto nuevamente para su reevaluación</p>
    <p> Comuníquese con el usuario del ticket para cualquier información adicional: {!! $user !!}</p>

</div>

</body>

</html>