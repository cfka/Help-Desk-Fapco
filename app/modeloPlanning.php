<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloPlanning extends Model
{
    protected $table = 'planning';
    protected $primarykey = 'id';

    protected $fillable = [
        'admin_id',
        'company_id',
        'planning_at',
        'planned_at',
        'ceco_id',
        'type',
        'assets_list_id'
    ] ;

    public $timestamps = false;
    //
}
