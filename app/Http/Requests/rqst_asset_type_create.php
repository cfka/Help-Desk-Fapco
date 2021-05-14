<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_asset_type_create extends FormRequest
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
            'type' => 'required|unique:assets_type'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'El TIPO DE ACTIVO no puede estar vacio',
            'type.unique'  => 'Ya existe un TIPO DE ACTIVO con ese nombre',
            'type.regex'  => 'El TIPO DE ACTIVO solo acepta letras y espacio',

        ];
    }
}
