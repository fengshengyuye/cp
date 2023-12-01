<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=>['required','between:3,255',Rule::unique('cats','title')->ignore($this->route('cat')->id)],
            'order'=>['numeric'],
            'preview'=>['url'],
        ];
    }
    public function  attributes()
    {
        return [
            'title'=>'产品大类名称',
            'order'=>'产品大类排序',
            'preview'=>'产品大类预览图',
        ];
    }
}
