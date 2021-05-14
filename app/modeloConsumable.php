<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloConsumable extends Model
{
    protected $table = 'consumables';
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
        'description'
     ] ;

    public $timestamps = false;

    public static function consumible($id){
        return modeloConsumable::where('type','=',$id)
            ->get();
    }

}
