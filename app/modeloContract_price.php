<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloContract_price extends Model
{
    //
    protected $table = 'contract_prices';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'contract_id',
        'price'
        
     ] ;

    public $timestamps = false;
}
