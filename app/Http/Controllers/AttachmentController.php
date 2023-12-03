<?php

namespace App\Http\Controllers;

use App\Services\UploadService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    //上传图片
    public function  image(Request $request){
        $request->validate([
            'file'=>['required','image','max:2048']
        ],['file.max'=>'文件大小不能超过2MB']);
        $url= app(UploadService::class)->image(request('file'));
        return $this->success(data:['url'=>$url]);
    }

}
