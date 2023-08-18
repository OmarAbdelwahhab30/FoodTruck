<?php

use App\Http\Controllers\Payment\ApplePay\ApplePayPayment;
use App\Http\Controllers\Payment\PayPal\PaymentController;
use Illuminate\Support\Facades\Route;


Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->middleware("auth:sanctum")
    ->group(function () {
        Route::get('payment/{customer_id}/{order_id}/{currency}/{amount}/{seller_id}', 'index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
        Route::get("success",'SUC')->name("suc");
        Route::get("error",'er')->name("er");
    });


Route::controller(ApplePayPayment::class)
    ->prefix('apple-pay')
    ->group(function () {
        Route::get("apple",'index');
    });


