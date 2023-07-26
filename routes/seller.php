<?php

use App\Http\Controllers\Sections\AddSectionController;
use App\Http\Controllers\Sections\UpdateSectionController;
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

    Route::post("add_section",[AddSectionController::class,"addSection"]);

    Route::post("update_section",[UpdateSectionController::class,"updateSection"]);

    Route::post("updateTruckInfo",[UpdateTruckInformationController::class,"UpdateTruckInformation"]);

    Route::post("deleteTruckImageByImage_ID",[DeleteTruckImageController::class,'DeleteTruckImage']);

    Route::post("ChangeDeliveryStatus",[UpdateTruckInformationController::class,"ChangeDeliveryStatus"]);

});
