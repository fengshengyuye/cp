<?php

namespace App\Http\Requests;

use App\Rules\CodeCheckRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email',Rule::unique('users','email')],
            'password' => ['required', 'min:3', 'confirmed'],
            'code'=>['required',new CodeCheckRule()]
        ];
    }
    public function attributes(){
        return [
            'email'=>'邮箱'
        ];
    }
}
