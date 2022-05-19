<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPictureRequest extends FormRequest
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
            'horse_image' =>  ($this->picture) ? 'nullable|file|max:10000|mimes:jpeg,png,jpg,pdf' : 'required|file|max:10000|mimes:jpeg,png,jpg,pdf', //編集時のバリデーション : 登録時のバリデーション
            'comment' => 'required',
        ];
    }
    
    
    public function messages()
{
    return [
        'horse_image.required' => 'ファイルを選択してください。',
        'horse_image.max' => '10 MBを超えるファイルは添付できません。',
        'horse_image.mimes' => '指定のファイル形式以外は添付できません。',
        'comment.required' => 'コメントを入力してください。',
    ];
}
}
