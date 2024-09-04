<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/posts', [PostController::class,'index'])->name('posts.index');
route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');

route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');
route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');


