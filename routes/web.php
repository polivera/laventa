<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return redirect('/productos');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/productos', [ProductController::class, 'list'])->name('product-list');
    Route::get('/producto/{id}', [ProductController::class, 'detail'])->name('product-detail');
    Route::get('/producto/{id}/reservar', [ProductController::class, 'reserve'])->name('product-reserve');
});

Route::middleware(['auth', 'verified', 'is-admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/productos', [AdminProductController::class, 'index'])->name('admin-product');
        Route::post('/productos', [AdminProductController::class, 'save'])->name('admin-product-save');
        Route::get('/productos/agregar', [AdminProductController::class, 'add'])->name('admin-product-add');
        Route::get('/productos/{id}', [AdminProductController::class, 'detail'])->name('admin-product-detail');
        Route::get('/productos/{id}/borrar', [AdminProductController::class, 'delete'])->name('admin-product-delete');

        Route::get('/usuarios', [AdminUserController::class, 'index'])->name('admin-user');
        Route::post('/usuarios', [AdminUserController::class, 'save'])->name('admin-user-save');
        Route::get('/usuarios/agregar', [AdminUserController::class, 'add'])->name('admin-user-add');
        Route::get('/usuarios/{id}', [AdminUserController::class, 'details'])->name('admin-user-detail');
        Route::get('/usuarios/{id}/borrar', [AdminUserController::class, 'delete'])->name('admin-user-delete');
    });
});

require __DIR__ . '/auth.php';
