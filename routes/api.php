<?php

use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\notifications\ReturnAllNotificationsByIDController;
use App\Http\Controllers\notifications\SetPlayerIdController;
use App\Http\Controllers\Payment\PayPal\PaymentController;
use App\Http\Controllers\VAT\ReturnValuesController;
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

    Route::get("returnVAT",[ReturnValuesController::class,"returnVAT"]);
    Route::get("returnOwnerPercentage",[ReturnValuesController::class,"returnOwnerPercentage"]);
    Route::get("returnKiloPrice",[ReturnValuesController::class,"returnKiloPrice"]);
    Route::post("AddContactUsContent",[ContactUsController::class,'AddContactUsContent']);

});
