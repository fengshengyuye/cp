<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => ['required', 'between:3,255'],
            'order' => ['numeric'],
            'preview' => ['url'],
            'video' => ['url'],
            'desc' => ['required'],
            'sub_id'=>['required','numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '产品名称',
            'desc' => '产品描述',
            'order' => '产品排序',
            'preview' => '产品预览图',
            'video' => '产品视频',
            'sub_id'=>'产品类型id'
        ];
    }
}
