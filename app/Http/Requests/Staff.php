<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Staff extends FormRequest
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








    public function rules($check_id=null)
    {
        if ($check_id){
            return [
                "name"=>' required|min:2|max:20',
                "number"=>[
                    'required',
                    'max:4',
                    'min:4',
                     Rule::unique('staffs')->ignore($check_id),
                ],
                "gender"=>"required",
                "post"=>"required|max:20",
                "type"=>"required",
                "id_card"=>[
                    'required',
                    'max:18',
                    'min:18',
                    Rule::unique('staffs')->ignore($check_id),
                ],
                "tel"=>[
                    'required',
                    'max:11',
                    'min:11',
                     Rule::unique('staffs')->ignore($check_id),
                ],
                "nation"=>"required|max:5|min:2",
                "marital_status"=>"required",
                'entry_status'=>"required|max:2",
                'entry_date'=>"required",
                'dimission_date'=>"required",
                'politics_statu'=>"required",
                'education'=>"required",
                'health'=>"required|max:30",
                'specialty'=>"required|max:20",
                'registered'=>'required|max:10',
                'registered_address'=>"required|max:50",
                'graduate_date'=>"required",
                'graduate_college'=>'required|max:20',
                'intro'=>'required|max:150',
                'details'=>'required|max:150'
            ];
        }else{
            return [
                "name"=>' required|min:2|max:20',
                "number"=>'required|min:4|max:4|unique:staffs',
                "gender"=>"required",
                "post"=>"required|max:20",
                "type"=>"required",
                "id_card"=>"required|max:18|unique:staffs",
                "tel"=>"required|max:11|unique:staffs",
                "nation"=>"required|max:5|min:2",
                "marital_status"=>"required",
                'entry_status'=>"required|max:2",
                'entry_date'=>"required",
                'dimission_date'=>"required",
                'politics_statu'=>"required",
                'education'=>"required",
                'health'=>"required|max:30",
                'specialty'=>"required|max:20",
                'registered'=>'required|max:10',
                'registered_address'=>"required|max:50",
                'graduate_date'=>"required",
                'graduate_college'=>'required|max:20',
                'intro'=>'required|max:150',
                'details'=>'required|max:150'
            ];
        }

    }
}
