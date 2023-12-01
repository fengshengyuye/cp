<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindPasswordCodeRequest;
use App\Http\Requests\RegisterCodeRequest;
use App\Services\CodeService;


class CodeController extends Controller
{
    //给注册用户发送验证码
    public function registerCode(RegisterCodeRequest $request)
    {
      $code =  app(CodeService::class)->send($request->email);
        return $this->success('发送验证码成功',[
            'code'=>$code
        ]);
    }
    //找回密码发送验证码
    public function findPasswordCode(FindPasswordCodeRequest $request)
    {
        $code =  app(CodeService::class)->send($request->email);
        return $this->success('发送验证码成功',[
            'code'=>$code
        ]);
    }
}
