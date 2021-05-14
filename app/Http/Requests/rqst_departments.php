<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_departments extends FormRequest
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
            'name' => 'required',
            
            'ceco_id' => 'required|numeric',

            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'El NOMBRE del DEPARTAMENTO no puede estar vacio',
            'ceco_id.required' => 'El CECO del DEPARTAMENTO no puede estar vacio',
        ];
    }
}
