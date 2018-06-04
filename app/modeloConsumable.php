<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloConsumable extends Model
{
    protected $table = 'consumables';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'brand',
        'model',
        'reference'
     ] ;

    public $timestamps = false;
}
