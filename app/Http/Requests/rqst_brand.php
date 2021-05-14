<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_brand extends FormRequest
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
            'name' => 'required|unique:brands'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El NOMBRE DE LA MARCA no puede estar vacio',
            'name.unique'  => 'Ya existe una MARCA con ese nombre',
            'name.regex'  => 'El NOMBRE DE LA MARCA solo acepta letras y espacio',

        ];
    }
    
}
