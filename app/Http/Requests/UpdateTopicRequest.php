<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => ['required', 'between:3,255'],
            'content' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'title' => '帖子标题',
            'content' => '帖子内容',
        ];
    }
}
