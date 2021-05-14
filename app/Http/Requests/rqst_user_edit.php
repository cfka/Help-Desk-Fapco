<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_user_edit extends FormRequest
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
            ['document'=>'required|unique:users|min:7|',
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'email|unique:users',
                'position',
                'type'=>'required',
                'department_id'=>'required',
                'gender'=>'required',
                'password',
                'remember_token'
            //
        ]];
    }
}
