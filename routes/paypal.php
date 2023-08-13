<?php

use App\Http\Controllers\Payment\PayPal\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\PayPal\PaypalPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register paypal routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('pay-paypal',[PaypalPaymentController::class,"payWithpaypal"])->name('pay-paypal');
Route::get('paypal-status',[PaypalPaymentController::class,"getPaymentStatus"])->name('paypal-status');
Route::get('payment-success',[PaymentController::class,"success"])->name('payment-success');
Route::get('payment-fail',[PaymentController::class,"fail"])->name('payment-fail');


