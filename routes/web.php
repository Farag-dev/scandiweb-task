<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', [ProductsController::class, 'index'])->name('product.index');
Route::get('/create.product', [ProductsController::class, 'create'])->name('product.create');
Route::post('/add.product', [ProductsController::class, 'store'])->name('product.store');
Route::delete('/delete.product', [ProductsController::class, 'destroy'])->name('product.delete');



