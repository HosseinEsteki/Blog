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

    Route::get('user',function (){
        return \request()->user();
    });

    Route::apiResource('categories',\App\Http\Controllers\Api\CategoryController::class);
    Route::apiResource('comments',\App\Http\Controllers\Api\CommentController::class);
    Route::apiResource('posts',\App\Http\Controllers\Api\PostController::class);
    Route::apiResource('tags',\App\Http\Controllers\Api\TagController::class);
    Route::resource('roles',\App\Http\Controllers\Api\RoleController::class);
    Route::get('actions',[\App\Http\Controllers\Api\ActionController::class,'index']);
    Route::get('permissions',[\App\Http\Controllers\Api\PermissionController::class,'index']);
    Route::put('role-permissions/{role}',[\App\Http\Controllers\Api\RolePermissionController::class,'update']);

});
Route::get('get-api-token',function (){
    return \App\Models\User::find(1)->createToken("myApi")->plainTextToken;
});
