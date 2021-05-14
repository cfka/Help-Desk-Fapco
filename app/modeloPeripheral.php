<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloPeripheral extends Model
{
    protected $table = 'peripheral';
    protected $primarykey = 'id';

    protected $fillable = [
        'brands_id',
        'model',
        'serial',
        'type',
        'operational',
        'assigned',
    ] ;

    public $timestamps = false;

}
