<?php

use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\orders\AddOrderController;
use App\Http\Controllers\orders\ReturnOrderInformationController;
use App\Http\Controllers\orders\UpdateOrderStatusController;
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

    Route::post("AddOrder",   [AddOrderController::class, 'AddOrder']);



    Route::get("ReturnOrderInfoByOrderID",[ReturnOrderInformationController::class,"ReturnOrderInfoByOrderID"]);

    Route::post("RejectOrder",[UpdateOrderStatusController::class,"RejectOrder"]);

    Route::post("AcceptOrder",[UpdateOrderStatusController::class,"AcceptOrder"]);

    Route::post("OrderDelivered",[UpdateOrderStatusController::class,"OrderDelivered"]);

    Route::post("OrderPickedUp",[UpdateOrderStatusController::class,"OrderPickedUp"]);

});
