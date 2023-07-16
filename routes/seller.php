<?php

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


Route::group(['middleware' => 'auth:sanctum'],function ()
{
    Route::post("addProduct",[\App\Http\Controllers\Products\AddProductController::class,'addProduct']);
    Route::post("deleteProductImageByID",[\App\Http\Controllers\Products\UpdateProductImagesController::class,"deleteProductImageByID"]);
    Route::post("updateProduct",[\App\Http\Controllers\Products\UpdateProductController::class,'updateProduct']);

    Route::post("add_food_type",[\App\Http\Controllers\FoodTypes\AddFoodTypeController::class,"addFoodType"]);
    Route::post("update_food_type",[\App\Http\Controllers\FoodTypes\UpdateFoodTypeController::class,"updateFoodType"]);
});
