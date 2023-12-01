<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Nette\Utils\data;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('update', 'destroy');
    }

    //显示所有用户
    public function index()
    {
        return UserResource::collection(User::latest()->paginate());
    }

//显示单用户信息
    public function show(User $user)
    {
        return $this->success(data:new UserResource($user));
    }

    //更新单用户信息
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->fill($request->input())->save();
        return $this->success('用户信息更新成功',[
            'user'=>$user
        ]);
    }

    //删除单用户信息
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();
        return $this->success('删除成功');
    }

    //找回用户密码
    public function findPassword(FindPasswordRequest $request)
    {
        $user = User::whereEmail($request->email)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->success('重置密码成功', [
            'user' => $user
        ]);
    }
}
