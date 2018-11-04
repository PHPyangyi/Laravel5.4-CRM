<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Letter extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'staff_name'=>'required',
            'staff_id'=>'required',
            'message'=>'required',
            'send_name'=>'required',
            'send_id'=>'required'
        ];
    }
}
