<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloFailure extends Model
{
    //
    protected $table = 'failures';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'type',
        'name',
        'description'
     ] ;

    public $timestamps = false;
}
