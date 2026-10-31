<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IncomingInvoiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/category', [ProductCategoryController::class, 'index']);
Route::get('/category/{id}', [ProductCategoryController::class, 'show']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/update/{id}', [ProductController::class, 'update']);
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/invoice/{id}', [IncomingInvoiceController::class, 'show']);
