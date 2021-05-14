<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloConsumables_type extends Model
{
    protected $table = 'consumables_types';
    protected $primarykey = 'id';

    protected $fillable = [
        'name'
    ] ;

    public $timestamps = false;
}
