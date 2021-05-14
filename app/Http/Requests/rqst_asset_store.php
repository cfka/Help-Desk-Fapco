<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_asset_store extends FormRequest
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
            //
            'number' =>'required',
            'model' =>'required',
            'serial' =>'required',
            'ceco_id' =>'required',
            'user_id' =>'required',
            'location' =>'required',
            'assets_type_id' =>'required',
            'condition' =>'required',
            'brand_id' =>'required',
            'software_id' =>'required',
            'supervised' =>'required',
            'instalation_at' =>'required',
            'operation_at' =>'required',
            'installed' =>'required',
            'company_id' =>'required',
        ];


    }

    
    public function messages()
    {
        return [
            'numer.required' => 'El numero de activo fijo es obligatorio.'
        ];
    }





}
