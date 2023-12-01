<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
       //密码验证成功
            return $this->success('登录成功',[
                'token'=>$user->createToken('token')->plainTextToken,
                'user'=>new UserResource($user)
            ]);
        }
        throw ValidationException::withMessages([
            'password' => '密码错误'
        ]);

    }
}
