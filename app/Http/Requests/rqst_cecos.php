<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_cecos extends FormRequest
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
            'number' => 'required|unique:cecos|numeric',
            'company_id' => 'required|numeric',
            'manager' => 'required',

            
        ];
    }
    
    public function messages()
    {
        return [
            'number.required' => 'El NUMERO del CECO no puede estar vacio',
            'number.unique' => 'El NUMERO del CECO ya esta registrado',
            'company.required' => 'LA COMPAÑIA del CECO no puede estar vacio',
            'manager.required' => 'El GERENTE del CECO no puede estar vacio',
        ];
    }
}
