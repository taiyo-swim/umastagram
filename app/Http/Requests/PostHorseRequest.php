<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostHorseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //trueにしておく
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'horse_information.name' => 'required|max:20',
            'horse_information.sex' => 'required|max:10',
            'horse_information.color' => 'required|max:10',
            'horse_information.father_name' => 'required|max:20',
            'horse_information.mother_name' => 'required|max:20',
            'horse_information.mothers_father_name' => 'required|max:20',
            'horse_information.owner' => 'required|max:20',
            'horse_information.belong' => 'required|max:10',
            'horse_information.trainer' => 'required|max:20',
            'horse_information.producer' => 'required|max:20',
            'horse_information.birthday' => 'required|max:20',
            'horse_information.winning' => 'required',
            'horse_information.total_result' => 'required',
            'horse_information.netkeiba_url' => 'required',
        ];
    }
}
