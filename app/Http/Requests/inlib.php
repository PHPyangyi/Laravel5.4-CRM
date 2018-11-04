<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inlib extends FormRequest
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
            'product_id'=>'required',
            'number'=>'required|numeric',
            'staff_name'=>'required|max:20|min:2',
            'staff_id'=>'required',
            'mode'=>'required',
            'mode_explain'=>'required|max:150',
            'enter'=>'required|max:20|min:2'

        ];
    }

    public function messages()
    {

    }
}
