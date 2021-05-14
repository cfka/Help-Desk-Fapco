<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloticket extends Model
{
    //
    protected $table = 'tickets';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'asset_id',
        'status',
        'failure_id',
        'description',
        'priority',
        'source_id',
        'user_id',
        'admin_id',
        'created_at',
        'solved_at',
        'assigned_at',
        'blocked_at',
        'unblocked_at',
        'blocked_reason',
        'elapsed_time',
        'blocked_time',
        'total_time',
        'effective_time',
        'working_at',
        'according',
        'according_reason',
        'key',
        'planning_at'
     ] ;

    public $timestamps = true;
}
