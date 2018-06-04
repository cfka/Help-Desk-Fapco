<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloAsset_history extends Model
{
    //
    protected $table = 'asset_history';
    protected $primarykey = 'id';
    
    protected $fillable = [
       
        'asset_id',
        'user_id',
        'created_at'
     ] ;

  //  public $timestamps = false;
}
