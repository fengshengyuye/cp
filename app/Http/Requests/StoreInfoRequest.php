<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>['required','between:3,255',Rule::unique('infos','title')],
            'desc'=>['required','min:3'],
            'preview'=>['url'],
            'video'=>['url']
        ];
    }
    public function attributes(){
        return [
            'title'=>'新闻资讯',
            'desc'=>'新闻内容',
            'preview'=>'新闻缩略图',
            'video'=>'新闻视频'
        ];
    }
}
