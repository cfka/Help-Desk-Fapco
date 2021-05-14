<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class modeloModel extends Model
{
    use SoftDeletes;
    //
    protected $table = 'model';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'brand_id'

    ] ;
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public static function model($id){
        return modeloModel::where('brand_id','=',$id)
            ->get();
    }
}
