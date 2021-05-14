<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloDepartment extends Model
{
    //
    // use SoftDeletes;
    protected $table = 'departments';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'ceco_id'
     ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;

    public static function deparment($id){
        return modeloDepartment::where('id','=',$id)
            ->get();
    }

    public static function departmentbyceco($id){
        return modeloDepartment::where('ceco_id','=',$id)
            ->get();
    }
}
