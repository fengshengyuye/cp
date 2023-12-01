<?php

namespace App\Http\Requests;

use App\Rules\CodeCheckRule;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FindPasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','confirmed','min:3'],
            'code'=>['required',new CodeCheckRule()]
        ];
    }
    public function attributes(){
        return [
            'email'=>'邮箱'
        ];
    }
}
