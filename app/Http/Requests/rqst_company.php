<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_company extends FormRequest
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
            'name' => 'required|unique:companies',


            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'El NOMBRE de la COMPAÑIA no puede estar vacio',
            'name.unique' => 'El NOMBRE de la COMPAÑIA ya esta registrado',
        ];
    }
}
