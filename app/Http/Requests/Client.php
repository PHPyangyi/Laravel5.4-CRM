<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Client extends FormRequest
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
            'name'=>'required|max:20|min:2',
            'tel'=>'required|min:11|max:11',
            'company'=>'required|max:30|min:2',
            'source'=>'required',
            'enter'=>'required|min:2|max:20'
        ];
    }

    public function messages()
    {

    }
}
