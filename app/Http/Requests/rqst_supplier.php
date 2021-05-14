<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_supplier extends FormRequest
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
            'rif' => 'required|unique:suppliers',
            'name' => 'required|unique:suppliers',
            'contac_phone' => 'required',
            'email' => 'required|email',

            
        ];
    }
    
    public function messages()
    {
        return [
            'rif.required' => 'El RIF del PROVEEDOR no puede estar vacio',
            'rif.unique'  => 'Ya existe un PROVEEDOR con ese RIF',
            'name.required' => 'El NOMBRE DEL PROVEEDOR no puede estar vacio',
            'name.unique'  => 'Ya existe un PROVEEDOR con ese nombre',
            'contac_phone.required' => 'El TELEFONO DE CONTACTO no puede estar vacio',
            'email.required' => 'El EMAIL DEL PROVEEDOR no puede estar vacio',
        ];
    }
}
