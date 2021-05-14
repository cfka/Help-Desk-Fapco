<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloTicket_history extends Model
{
    protected $table = 'tickets_history';
    protected $primarykey = 'id';

    protected $fillable = [
        'ticket_id',
        'update_at',
        'field',
        'update'
    ] ;

    public $timestamps = false;
}
