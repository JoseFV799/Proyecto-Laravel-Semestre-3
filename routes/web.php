<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return redirect('/posts');
});

Route::get('/home', function(){
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'index']);
Route::view('/posts/create', 'posts.create');
Route::post('/posts/create', [PostController::class, 'store']);
Route::get('/posts/myPosts', [PostController::class, 'userPosts']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments', [CommentController::class, 'store']);
Route::delete('/posts/{id}', [PostController::class, 'eliminar']);
Route::view('/user/modify', 'users.modifyUser');
Route::get('/user/modify/{id}', [UserController::class, 'ModifyUser'])->name('ModifyUser');
Route::get('/user/deleteUser', [UserController::class, 'DeleteUser'])->name('DeleteUser');


Auth::routes();

Route::get(
    '/home',
    [App\Http\Controllers\PostController::class,'index'])-> name('home');