<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloAsset_type extends Model
{
    // use SoftDeletes;

    protected $table = 'assets_type';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type'

    ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;
}
