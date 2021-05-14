<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloConsumable_history extends Model
{
    protected $table = 'consumables_history';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'ceco_id',
        'assets_id',
        'user_id',
        'type',
        'brand_id',
        'model',
        'min',
        'max',
        'stock',
        'uso',
        'recharge',
        'damaged',
        'enter',
        'replace',
        'description',
        'consumables_id',
        'created_at'
     ] ;

    public $timestamps = false;


}
