<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class modeloPlanning_asset extends Model
{
    use SoftDeletes;
    //
    protected $table = 'planning_assets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'planning_id',
        'asset_id',
    ] ;
    protected $dates = ['deleted_at'];
    public $timestamps = false;

}
