<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloAsset extends Model
{
    protected $table = 'assets';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'number',
        'brand',
        'model',
        'serial',
        'ceco_id',
        'user_id',
        'datasheet_id',
        'is_active',
        'segurity_code',
        'software',
        'location'
     ] ;

    public $timestamps = false;
}
