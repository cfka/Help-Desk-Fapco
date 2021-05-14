<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use DB;

class modeloAsset extends Model
{
    protected $table = 'assets';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'number',
        'model',
        'serial',
        'ceco_id',
        'user_id',
        'datasheet_id',
        'is_active',
        'segurity_code',
        'location',
        'assets_type_id',
        'condition',
        'brand_id',
        'software_id',
        'bill_at',
        'nro_order',
        'cost',
        'warranty',
        'warranty_end',
        'supplier_id',
        'description',
        'supervised',
        'instalation_at',
        'operation_at',
        'installed',
        'company_id',
        'other_peripheral',
        'document',
        'tmodel',
        'tserial',
        'tbrands_id',
        'mmodel',
        'mserial',
        'mbrands_id',
        'rmodel',
        'rserial',
        'rbrands_id',
        'omodel',
        'oserial',
        'obrands_id'

     ] ;

    public $timestamps = false;

    public static function assets_user($id){
        return modeloAsset::where('user_id','=',$id)
            ->get();
    }

    public static function ceco_assets($id){
        return modeloAsset::where('ceco_id','=',$id)
            ->get();
    }

    public static function assets_company($id){
        return modeloAsset::where('company_id','=',$id)
            ->get();
    }

    public static function assetUser($id){
        return $assets= DB::select("SELECT DISTINCT a.id, a.model
        FROM  helpdesk.assets a
        where a.user_id = $id and (a.assets_type_id=2 or a.assets_type_id=9)"); 
    }
}

