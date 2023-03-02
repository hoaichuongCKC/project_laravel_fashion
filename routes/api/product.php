<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    
    Route::controller(CategoryController::class)->group(function(){
    
        Route::post('/cate/fetch-categories','fetchCategories');
    });

    Route::controller(ProductController::class)->group(function(){
    
        Route::post('/product/fetch-product-all','fetchAll');
    });
});
