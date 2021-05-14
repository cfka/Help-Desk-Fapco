<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modeloService extends Model
{
    use SoftDeletes;
    //
    protected $table = 'services';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'name',
        'price',
        'contract_id',
        'ceco_id'        
     ] ;
    protected $dates =['deleted_at'];
    public $timestamps = false;
}
