<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/author/post/edit/{id}',[\App\Http\Controllers\PostController::class,'editPost'])->name('post.edit');
Route::post('/author/post/edit/{id}', [\App\Http\Controllers\PostController::class, 'updatePost'])->name('post.update');


Route::get('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');


Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [App\Http\Controllers\CommentController::class, 'replyStore'])->name('reply.add');


Route::get('/login/facebook', [LoginController::class, 'redirectToProvider']);
Route::get('/login/facebook/callback', [LoginController::class, 'handleProviderCallback']);


