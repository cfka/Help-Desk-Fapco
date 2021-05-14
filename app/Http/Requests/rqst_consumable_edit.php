<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_consumable_edit extends FormRequest
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
            'user' => 'required|numeric',
            'type' => 'required',
            'brands_id' => 'required|numeric',
            'model' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'use' => 'required|numeric',
            'stock' => 'required|numeric',
            'recharge' => 'required|numeric',
            'damaged' => 'required|numeric',
            'enter' => 'required|numeric',
            'replace' => 'required|numeric',

        ];
    }
    
    public function messages()
    {
        return [
            'user.required' => 'El USURIAO no puede estar vacio',
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
