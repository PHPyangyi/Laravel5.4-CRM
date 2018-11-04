<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Documentary extends FormRequest
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
            'title'=>'required|max:20|min:2',
            'client_id'=>'required',
            'staff_id'=>'required',
            'staff_name'=>'required|max:20|min:2',
            'way'=>'required',
            'evolve'=>'required',
            'remark'=>'required',
            'client_company'=>'required',
            'enter'=>'required|min:2|max:20',
            'sn'=>'required|max:20',

        ];
    }
}
