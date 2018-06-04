<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloAsset_consumable extends Model
{
    //
    protected $table = 'assets_consumables';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'asset_id',
        'consumable_id',
        'qty'        
     ] ;

    public $timestamps = false;
}
