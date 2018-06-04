<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloService extends Model
{
    //
    protected $table = 'services';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'name',
        'price',
        'contract_id',
        'ceco_id'        
     ] ;

    public $timestamps = false;
}
