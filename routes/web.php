<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PostController::class)->prefix('posts')->group(function() {
    Route::get('/', 'index')->name('post');
    Route::post('/', 'store')->name('post.store');
    Route::delete('/{id}', 'destroy')->name('post.destroy');
});