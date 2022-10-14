<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/producto/{id}', [ProductController::class, 'detail']);

Route::prefix('/admin')->group(function () {
    Route::prefix('/productos')->group(function () {
        Route::get('/', [AdminProductController::class, 'index']);
        Route::get('/agregar', [AdminProductController::class, 'add']);
        Route::post('/', [AdminProductController::class, 'save']);
        Route::get('/{id}', [AdminProductController::class, 'detail']);
        Route::delete('/{id}', [AdminProductController::class, 'delete']);
    });
});
