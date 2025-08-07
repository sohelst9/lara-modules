<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;
use Modules\Post\Http\Controllers\SearchPostController;

Route::resource('post', PostController::class);
Route::get('/posts/search', [SearchPostController::class, 'search'])->name('post.search');
Route::get('/posts/data', [SearchPostController::class, 'postData'])->name('post.data');
