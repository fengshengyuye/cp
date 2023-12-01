<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',LoginController::class);
Route::post('register',\App\Http\Controllers\RegisterController::class);
Route::post('send/register/code',[CodeController::class,'registerCode']);
Route::post('send/findPassword/code',[CodeController::class,'findPasswordCode']);
Route::put('findPassword',[UserController::class,'findPassword']);
Route::apiResource('user',UserController::class);
Route::apiResource('info',InfoController::class);
Route::apiResource('cat',CatController::class);
Route::apiResource('sub',SubController::class);
Route::apiResource('product',ProductController::class);
