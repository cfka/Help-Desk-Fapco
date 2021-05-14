<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloAssets_has_peripheral extends Model
{
    protected $table = 'assets_has_peripheral';
    
    protected $fillable = [
        'assets_id',
        'peripheral_id'
     ] ;

    public $timestamps = false;
}
