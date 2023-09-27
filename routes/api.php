<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('categories',[\App\Http\Controllers\Api\ApiCategoryController::class,'index']);
    Route::get('categories/create',[\App\Http\Controllers\Api\ApiCategoryController::class,'create']);
});
// 1|laravel_sanctum_TF0Hh56QxbwLhwYE7GYgDSBTJnhoqSd2qJqFA86Kec08bc5e
Route::get('get-user-token',function (){
    return \App\Models\User::find(1)->createToken("myApi")->plainTextToken;
});
