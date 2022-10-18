<?php

use App\Http\Controllers\AdminProductController;
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
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/productos', [AdminProductController::class, 'index'])->name('admin');
    Route::post('/admin/productos', [AdminProductController::class, 'save'])->name('admin-product-save');
    Route::get('/admin/productos/agregar', [AdminProductController::class, 'add'])->name('admin-product-add');
    Route::get('/admin/productos/{id}', [AdminProductController::class, 'detail'])->name('admin-product-detail');
    Route::get('/admin/productos/{id}/borrar', [AdminProductController::class, 'delete'])->name('admin-product-delete');
});

require __DIR__ . '/auth.php';
