<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'key',
        'user_id',
        'created_at',
        'expiration_date',
        'status' ] ;

    public $timestamps = false;
}
