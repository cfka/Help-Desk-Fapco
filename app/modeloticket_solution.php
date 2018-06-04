<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloticket_solution extends Model
{
    
    protected $table = 'ticket_solutions';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'ticket_id',
        'solution_id'
     ] ;

    public $timestamps = false;
}
