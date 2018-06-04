<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloContract extends Model
{
    //
    protected $table = 'contracts';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'number',
        'expiration',
        'supplier_id',
     ] ;

    public $timestamps = false;
}
