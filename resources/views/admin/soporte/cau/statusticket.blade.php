@php
$labelt="";
 $statust= "";
@endphp
@switch($ticket->status)
    @case('NEW')
    @php
        $statust= "NUEVO";
        $labelt= "label bg-blue-grey";
    @endphp
    @break
    @case('PENDING')
    @php
        $statust= "PENDIENTE";
        $labelt= "label bg-grey";
    @endphp
    @break

    @case('ASSIGNED')
    @php
        $statust= "ASIGNADO";
        $labelt= "label bg-orange";
    @endphp
    @break
    @case('BLOCKED')
    @php
        $statust= "BLOQUEADO";
        $labelt= "label bg-red";
    @endphp
    @break
    @case('WORKING')
    @php
        $statust= "EN PROCESO";
        $labelt= "label bg-blue";
    @endphp
    @break
    @case('SOLVED')
    @php
        $statust= "SOLUCIONADO";
        $labelt= "label bg-green";
    @endphp
    @break
    @case('CLOSED')
    @php
        $statust= "CERRADO";
        $labelt= "label bg-blue-grey";
    @endphp
    @break
    @php
        $statust= "ERROR";
        $labelt= "label bg-red";
    @endphp
@endswitch
<td><span class="{{$labelt}}">{{$statust}}</span></td>