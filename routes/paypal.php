<?php

use App\Http\Controllers\Payment\PayPal\PaymentController;
use Illuminate\Support\Facades\Route;


Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::get('payment/{customer_id}/{order_id}/{currency}/{amount}', 'index')->name('create.payment');
        Route::get('handle-payment/{customer_id}/{order_id}/{currency}/{amount}', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success/{customer_id}/{order_id}/{currency}/{amount}', 'paymentSuccess')->name('success.payment');
    });
