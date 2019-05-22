<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValiRequest extends FormRequest
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
            'content' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '投稿内容は必須項目です',
            'content.max' => '最大255文字までです',

        ];
    }
}
