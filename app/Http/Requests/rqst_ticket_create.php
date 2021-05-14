<?php

namespace Helpdesk\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rqst_ticket_create extends FormRequest
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
            'asset_id'=>'required',
            'status',
            'failure_id'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'source_id',
            'user_id'=>'required',
            'admin_id',
            'created_at',
            'solved_at',
            'assigned_at',
            'blocked_at',
            'unblocked_at',
            'elapsed_time',
            'blocked_time',
            'total_time',
            'effective_time',
            'working_at',
            'according',
            'according_reason',
            'key',
            'update_at',
            //
        ];
    }
}
