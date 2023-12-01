<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => ['required', 'between:3,255'],
            'cat_id'=>['sometimes','numeric'],
            'preview' => ['url'],
            'order' => ['numeric']
        ];
    }

    public function attributes()
    {
        return [
            'title' => '产品类型名称',
            'preview' => '产品类型缩略图',
            'order' => '产品类型排序',
            'cat_id'=>'所属产品大类的id'
        ];
    }

}
