<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_assets extends FormRequest
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
            'company_id' => 'required|numeric',
            'ceco' => 'required|numeric',
            'department' => 'required|numeric',
            'user_id' => 'required|numeric',
            'type' => 'required',
            'brands_id' => 'required|numeric',
            'number' => 'required',
            'assets_type_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'model' => 'required',
            'serial' => 'required',            
            'condition' => 'required',            
            'software_id' => 'required',            
            'serial' => 'required|numeric',            
            // 'supplier_id' => 'required|numeric',            
            'installed' => 'required|numeric',            
            'instalation_at' => 'required',            
            'operation_at' => 'required',            
            'supervised' => 'required|numeric',            
        ];
    }
    
    public function messages()
    {
        return [
            'company_id.required' => 'La COMPAÑIA no puede estar vacio',
            'company_id.numeric' => 'La COMPAÑIA no solo acepta numerico',
            'ceco.required' => 'El CECO no puede estar vacio',
            'ceco.numeric' => 'El CECO no solo acepta numerico',
            'department.required' => 'El AREA no puede estar vacio',
            'user_id.numeric' => 'El AREA COMPAÑIA no solo acepta numerico',
            'user_id.required' => 'El AREA no puede estar vacio',
            'department.numeric' => 'El AREA COMPAÑIA no solo acepta numerico',
            'type.required' => 'El TIPO DE CONSUMIBLE no puede estar vacio',
            'brands.required' => 'La MARCA DEL CONSUMIBLE no puede estar vacio',
            'model.required' => 'El MODELO del CONSUMIBLE no puede estar vacio',
            'min.required' => 'La CANTIDAD MINIMA de CONSUMIBLE no puede estar vacio',
            'max.required' => 'LA CANTIDAD MAXIMA de CONSUMIBLE no puede estar vacio',
            'use.required' => 'El CONSUMIBLE EN USO no puede estar vacio',
            'stock.required' => 'El STOCK de CONSUMIBLE no puede estar vacio',
        ];
    }
}
