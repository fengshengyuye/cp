<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\ValidateEmailCodeNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

class CodeService
{
    /**
     * 验证码的发送和存入缓存
     * @param $email
     * @return int
     */
    public function send($email)
    {
        $user = User::factory()->make([
            'email' => $email
        ]);
        //判断短期内重复发送
        if(Cache::get($email)) abort(403,'请勿在短期内重复发送');
        //发送邮件
        Notification::send($user,new ValidateEmailCodeNotification($code=$this->getCode()));

        //将验证码写入缓存
        Cache::put($email,$code,config('my.cache_expire_time',60));
        return $code;
    }

    public function getCode()
    {
        return mt_rand(10000, 999999);
    }

}
