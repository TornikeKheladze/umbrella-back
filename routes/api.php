<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/product', [ProductController::class, 'index']);
Route::get('/productDetail/{id}', [ProductController::class, 'show']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/category/store', [CategoryController::class, 'store']);
