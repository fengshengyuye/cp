<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FindPasswordCodeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email'=>['required','email',Rule::exists('users','email')]
        ];
    }
    public function attributes(){
        return [
            'email'=>'邮箱'
        ];
    }
}
