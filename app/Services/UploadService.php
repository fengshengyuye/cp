<?php

namespace App\Services;

use Spatie\Image\Manipulations;

class UploadService{
    public function image($file,$width=800,$height=800,$fit=Manipulations::FIT_CONTAIN){
        //返回存储的相对路径
$filePath = $file->store('attachments');
//获取上传图片的绝对路径
        $realPath = storage_path('app/'.$filePath);
        //缩放裁切图片
        Image::load($realPath)->fit($fit,$width,$height)->save();
        return url($filePath);
    }
}
