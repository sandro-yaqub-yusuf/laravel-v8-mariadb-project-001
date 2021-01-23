<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projeto', [HomeController::class, 'project'])->name('project');

Route::prefix('produtos')->group(function() {
    Route::get('', [ProductsController::class, 'index'])->name('product-index');
    Route::get('/create', [ProductsController::class, 'create'])->name('product-create');
    Route::post('/store', [ProductsController::class, 'store'])->name('product-store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->where('id', '[0-9]+')->name('product-edit');
    Route::put('/update/{id}', [ProductsController::class, 'update'])->where('id', '[0-9]+')->name('product-update');
    Route::get('/show/{id}', [ProductsController::class, 'show'])->name('product-show');
});
