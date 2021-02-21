<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['authCheck']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/projeto', [HomeController::class, 'project'])->name('project');
    Route::get('/auth/login',[AuthController::class, 'login'])->name('auth-login');
    Route::post('/auth/login',[AuthController::class, 'loginCheck'])->name('auth-loginCheck');
    Route::get('/auth/register',[AuthController::class, 'register'])->name('auth-register');
    Route::post('/auth/register',[AuthController::class, 'registerCheck'])->name('auth-registerCheck');
    Route::get('/auth/logout',[AuthController::class, 'logout'])->name('auth-logout');
    
    Route::prefix('produtos')->group(function() {
        Route::get('', [ProductsController::class, 'index'])->name('product-index');
        Route::get('/create', [ProductsController::class, 'create'])->name('product-create');
        Route::post('/store', [ProductsController::class, 'store'])->name('product-store');
        Route::get('/edit/{id}', [ProductsController::class, 'edit'])->where('id', '[0-9]+')->name('product-edit');
        Route::put('/update/{id}', [ProductsController::class, 'update'])->where('id', '[0-9]+')->name('product-update');
        Route::get('/show/{id}', [ProductsController::class, 'show'])->where('id', '[0-9]+')->name('product-show');
        Route::get('/destroy/{id}', [ProductsController::class, 'destroy'])->where('id', '[0-9]+')->name('product-destroy');
        Route::delete('/delete/{id}', [ProductsController::class, 'delete'])->where('id', '[0-9]+')->name('product-delete');
    });
});
