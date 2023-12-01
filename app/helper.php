<?php
use Illuminate\Support\Facades\Auth;
if (!function_exists('isSuperAdmin')){
function isSuperAdmin() {
    return Auth::user()&&Auth::id()==1;
}
}
