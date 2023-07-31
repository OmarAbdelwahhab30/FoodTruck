<?php

use App\Http\Controllers\Carts\AddToCartController;
use App\Http\Controllers\Carts\DeleteFromCartController;
use App\Http\Controllers\Carts\GetCartController;
use App\Http\Controllers\ContactUs\ContactUsController;
use App\Services\Carts\DeleteFromCartService;
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

Route::group(['middleware' => 'auth:sanctum'],function () {

    Route::post("AddToCart",[AddToCartController::class,'AddToCart']);
    Route::post("deleteProductFromCartByProduct_id",[DeleteFromCartController::class,"RemoveProductFromCart"]);
    Route::get("GetCart",[GetCartController::class,'GetCart']);
});
