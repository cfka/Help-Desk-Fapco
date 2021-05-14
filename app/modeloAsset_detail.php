<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modeloAsset_detail extends Model
{
    use SoftDeletes;

    protected $table = 'assets_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'asset_id',
        'motherboard',
        'processor',
        'HDD',
        'CD-DVD',
        'RAM',
        'floppy',
        'description'

    ] ;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
