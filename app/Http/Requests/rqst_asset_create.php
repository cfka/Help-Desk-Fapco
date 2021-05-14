<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_asset_create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'number'=>'required',
            'brand_id'=>'required',
            'model'=>'required',
            'serial'=>'required',
            'ceco_id'=>'required',
            'user_id'=>'required',
            'datasheet_id',
            'is_active',
            'security_code',
            'software_id',
            'location'=>'required',
            'description'=>'',
            'assets_type_id',
            'condition',
            'bill_at',
            'nro_order',
            'cost',
            'warranty',
            'warranty_end',
            'supplier_id'
            //
        ];
    }



    public function messages()
    {
        return [
            'numer.required' => 'El numero de activo fijo es obligatorio.'
        ];
    }

}
