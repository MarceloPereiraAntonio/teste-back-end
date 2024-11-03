<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function (){    
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::group(['prefix' => '/products', 'as' => 'product.'], function (){
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => '/categories', 'as' => 'category.'], function (){
        Route::get('category', [CategoryController::class, 'index'])->name('index'); 
        Route::get('category/create', [CategoryController::class, 'create'])->name('create');
        Route::post('category', [CategoryController::class, 'store'])->name('store');
        Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('category/{category}', [CategoryController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => '/users', 'as' => 'user.'], function () {
        Route::get('user', [UserController::class, 'index'])->name('index');
        Route::put('user', [UserController::class, 'update'])->name('update');    
    });
});
