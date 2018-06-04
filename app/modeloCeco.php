<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloCeco extends Model
{
    //
    protected $table = 'cecos';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'number',
        'company_id'
        ] ;

    public $timestamps = false;
}
