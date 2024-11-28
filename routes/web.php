<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::get('/','index');
    Route::get('/create');
    Route::get('/edit/{id}','edit');
    Route::post('/store','store');
    Route::post('/update/{id}','update');
    Route::get('/show/{id}','show');
});
