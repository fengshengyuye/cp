<?php
use Illuminate\Support\Facades\Auth;
if (!function_exists('isSuperAdmin')){
function isSuperAdmin() {
    return Auth::user()&&Auth::id()==1;
}
}
//返回模型 modelClass(abx) 返回App\Models\Abx
if(!function_exists('modelClass')){
    function modelClass($name){
        return 'App\Models\\'.ucfirst($name);
    }
}
//返回模型实例 model(abx,3) 返回App\Models\Abx::find(3)
if(!function_exists('model')){
    function model($name,$id){
        return modelClass($name)::findOrFail($id);
    }
}

