<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_software_edit extends FormRequest
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
            'name' => 'required'
            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'El NOMBRE DEL SOFTWARE no puede estar vacio',
            'name.regex'  => 'El NOMBRE DEL SOFTWARE solo acepta letras y espacio',

        ];
    }
}
