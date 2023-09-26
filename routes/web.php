<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/u', function () {
    return view('users');
})->name('users');



// Posts Route
Route::get('/all-posts', [PostController::class, 'index'])->name('all-posts');
Route::get('/show-posts', function () {
    return view('Posts.Show-Posts');
})->name('show-posts');

Route::get('/create-post', [PostController::class,'create'])->name('create-post');
Route::post('/create-post', [PostController::class,'store'])->name('store-post');
// Route::get('/all-articles', function () {
//     return view('Articles.Show-All-Articles');
// })->name('all-articles');




// Categories Route
Route::get('/all-categories', [CategoryController::class, 'index'])->name('all-categories');
Route::get('/create-categorie', [CategoryController::class,'create'])->name('create-categorie');
Route::post('/create-categorie', [CategoryController::class,'store'])->name('store-categorie');




// Tags Route
Route::get('/all-tags', [TagController::class, 'index'])->name('all-tags');
Route::get('/create-tag', [TagController::class,'create'])->name('create-tag');
Route::post('/create-tag', [TagController::class,'store'])->name('store-tag');






Route::get('/actions',[\App\Http\Controllers\ActionController::class,'index'])->name('actions');
\Route::get('/temp',function (){
    \App\Models\Category::create(['creator_id'=>1,'name'=>'8']);
return redirect()->route('actions');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});


