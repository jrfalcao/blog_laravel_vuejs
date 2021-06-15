<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // ROUTES POST
    Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');    
    //Route::get('/{search}', [App\Http\Controllers\PostController::class, 'index'])->name('home');    
    Route::get('/newPost', [App\Http\Controllers\PostController::class, 'newPost'])->name('newPost');    
    Route::post('/savePost', [App\Http\Controllers\PostController::class, 'savePost'])->name('savePost');    
    Route::post('/delete_post', [App\Http\Controllers\PostController::class, 'deletePost'])->name('delete_post');    
    
    // ROUTES CATEGORIES
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');    
    Route::get('/new_category', [App\Http\Controllers\CategoryController::class, 'new_category'])->name('new_category');   
    Route::post('/new_category', [App\Http\Controllers\CategoryController::class, 'create_category'])->name('new_category');   
    Route::get('/edit_category_view/{id}', [App\Http\Controllers\CategoryController::class, 'edit_category'])->name('edit_category_view');   
    Route::post('/edit_category', [App\Http\Controllers\CategoryController::class, 'put_category'])->name('edit_category');   
    Route::get('/delete_category/{id}', [App\Http\Controllers\CategoryController::class, 'delete_category'])->name('delete_category');   
    
    Route::post('/getAuthor', [App\Http\Controllers\UserController::class, 'getUserByID'])->name('getUserByID');   
    
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');    
});
