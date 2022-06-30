<?php

use App\Http\Controllers\api\CartItems;
use App\Http\Controllers\api\ProductCategories;
use App\Http\Controllers\api\Products;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', Products::class);
Route::resource('cartItems', CartItems::class);
Route::resource('productCategories', ProductCategories::class);