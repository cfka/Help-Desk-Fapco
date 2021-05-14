<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloticket_solution extends Model
{
    
    protected $table = 'ticket_solutions';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'ticket_id',
        'solution_id',
        'description'
     ] ;

    public $timestamps = false;

    public static function getsolutiontick($id){
        return modeloticket_solution::where('ticket_id','=',$id)
            ->get();
    }
}
