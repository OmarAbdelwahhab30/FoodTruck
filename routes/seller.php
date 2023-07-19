<?php

use App\Http\Controllers\FoodTypes\AddFoodTypeController;
use App\Http\Controllers\FoodTypes\UpdateFoodTypeController;
use App\Http\Controllers\Products\AddProductController;
use App\Http\Controllers\Products\UpdateProductController;
use App\Http\Controllers\Products\UpdateProductImagesController;
use App\Http\Controllers\Trucks\DeleteTruckImageController;
use App\Http\Controllers\Trucks\UpdateTruckInformationController;
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

    Route::post("addProduct",[AddProductController::class,'addProduct']);

    Route::post("deleteProductImageByID",[UpdateProductImagesController::class,"deleteProductImageByID"]);

    Route::post("updateProduct",[UpdateProductController::class,'updateProduct']);

    Route::post("add_food_type",[AddFoodTypeController::class,"addFoodType"]);

    Route::post("update_food_type",[UpdateFoodTypeController::class,"updateFoodType"]);

    Route::post("updateTruckInfo",[UpdateTruckInformationController::class,"UpdateTruckInformation"]);

    Route::post("deleteTruckImageByImage_ID",[DeleteTruckImageController::class,'DeleteTruckImage']);

    Route::post("ChangeDeliveryStatus",[UpdateTruckInformationController::class,"ChangeDeliveryStatus"]);

});
