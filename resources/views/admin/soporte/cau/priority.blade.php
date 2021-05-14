@switch($ticket->priority)
    @case('LOW')
    @php
        $labelp="label bg-blue";
         $priority="BAJA";
    @endphp
    @break

    @case('MEDIUM')
    @php
        $labelp="label bg-orange";
        $priority="MEDIA";
    @endphp
    @break
    @case('HIGH')
    @php
        $labelp="label bg-red";
         $priority="ALTA";
    @endphp
    @break
    @php
        $labelp="label bg-gray";
        $priority= "ERROR";
    @endphp
    @break

@endswitch
<td><span class="{{$labelp}}">{{$priority}}</span></td>