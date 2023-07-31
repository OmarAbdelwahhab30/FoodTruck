<?php

use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Payment\PayPal\PaypalPaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'payment-mobile'], function () {
    Route::get('/', [PaypalPaymentController::class,"payment"])->name('payment-mobile');
    Route::get('set-payment-method/{name}', [PaypalPaymentController::class,"payment"])
        ->name('set_payment_method');
});
Route::post('pay-paypal',[PaypalPaymentController::class,"payWithpaypal"])->name('pay-paypal');
Route::get('paypal-status',[PaypalPaymentController::class,"getPaymentStatus"])->name('paypal-status');
Route::get('payment-success',[PaypalPaymentController::class,"success"])->name('payment-success');
Route::get('payment-fail',[PaypalPaymentController::class,"fail"])->name('payment-fail');

/*
 *
 * Admin Routes are here
 *
 */
// ............authentication.........................
Route::get("login",[LoginController::class,"index"])->name("admin.login");
Route::post("post",[LoginController::class,"postLogin"])->name("admin.post.login");


// .............Dashboard..............................
Route::get("home",[HomeController::class,"index"])->name("admin.home");
