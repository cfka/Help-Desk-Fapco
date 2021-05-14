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
        'created_at',
        'number',
        'model',
        'serial',
        'ceco_id',
        'datasheet_id',
        'is_active',
        'security_code',
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
        'motherboard',
        'processor',
        'HDD',
        'CDDVD',
        'RAM',
        'floppy',
        'deparment_id',
        'teclado_id',
        'mouse_id',
        'reg_id',
        'otro_id'
     ] ;

   public $timestamps = false;
}
