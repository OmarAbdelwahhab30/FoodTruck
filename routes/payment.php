<?php

use App\Http\Controllers\Payment\Checkout\PaymentController;
//use App\Http\Controllers\Payment\PayPal\PaypalPaymentController;
use App\Http\Controllers\Payment\UserCard\AddCardInformationController;
use App\Http\Controllers\Payment\UserCard\DeleteCardInformationController;
use App\Http\Controllers\Payment\UserCard\ReturnCardsInformationController;
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

    Route::post("ExecutePayment", [PaymentController::class, 'ExecutePayment']);
    Route::get("ConfirmPayment", [PaymentController::class, 'ConfirmPayment']);
    Route::post("addCardInformation",[AddCardInformationController::class,"addCardInformation"]);
    Route::post("deleteCardInformation",[DeleteCardInformationController::class,"deleteCardInformation"]);
    Route::get("returnCardsInformation",[ReturnCardsInformationController::class,"returnCardsInformation"]);

});


//Route::post('paypal', [PaypalPaymentController::class, 'pay'])->name('payment');
//Route::get('success', [PaypalPaymentController::class, 'success'])->name("paypal.success");
//Route::get('error', [PaypalPaymentController::class, 'error'])->name("paypal.fail");
