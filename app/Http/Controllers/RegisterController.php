<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function  __invoke(RegisterRequest $request,User $user)
    {
        $data = ['password'=>Hash::make($request->password)]+$request->input();
        $user->fill($data)->save();
        return $this->success('注册成功',[
            'user'=>new UserResource($user->refresh())
        ]);
    }
}
