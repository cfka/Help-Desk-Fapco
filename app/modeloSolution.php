<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloSolution extends Model
{
    //
    protected $table = 'solutions';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'name',
        'description'
     ] ;

    public $timestamps = false;
}
