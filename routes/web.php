<?php

use App\Http\Controllers\admin\about\AboutController;
use App\Http\Controllers\admin\add_admins\AddAdminController;
use App\Http\Controllers\admin\auth\ForgetPasswordController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\contact\ContactUsMessagesController;
use App\Http\Controllers\admin\home\HomeController;
use App\Http\Controllers\admin\reviews\ReviewsAboutCustomersController;
use App\Http\Controllers\admin\reviews\ReviewsAboutTrucksController;
use App\Http\Controllers\admin\terms\TermsController;
use App\Http\Controllers\admin\update_account\UpdateAdminAccountController;
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

Route::group(['prefix' => 'admin'], function(){


    Route::group(['middleware' => 'guest'], function(){
        Route::get("/", [LoginController::class, "index"])->name("admin.login");
        Route::get("/forget", [ForgetPasswordController::class, "index"])->name("admin.forget");
        Route::post("/postForget",[ForgetPasswordController::class,'postForget'])->name("admin.post.forget");
        Route::post("/resetPass",[ForgetPasswordController::class,'resetPass'])->name("admin.post.reset");
        Route::get("/resetPass",[ForgetPasswordController::class,'resetPassIndex'])->name("admin.post.add.password");
        Route::post("post", [LoginController::class, "postLogin"])->name("admin.post.login");
    });
    Route::get('logout', [LoginController::class, "logout"])->name("admin.logout");



    Route::group(['middleware' => 'CanAccess'], function(){

        // .............Dashboard..............................
        Route::get("home", [HomeController::class, "index"])->name("admin.home");
        Route::get("returnLatestCustomers",[HomeController::class,"returnLatestCustomers"])->name("admin.home.latest.customers");

        /*About Us*/
        Route::get("about-us",[AboutController::class,"index"])->name("admin.about-us");
        Route::post("about-us",[AboutController::class,"PostAbout"])->name("admin.post.about");

        /*Terms and Conditions*/
        Route::get("terms",[TermsController::class,"index"])->name("admin.terms");
        Route::post("terms",[TermsController::class,"PostTerms"])->name("admin.post.terms");

        /*Customers messages*/
        Route::get("getCustomersMessages",[ContactUsMessagesController::class,"index"])->name("admin.customers.messages");

        /*Reviews about trucks*/
        Route::get("ReviewsAboutTrucks",[ReviewsAboutTrucksController::class,"index"])->name("admin.reviews.trucks");

        /*Reviews about customers*/
        Route::get("ReviewsAboutCustomers",[ReviewsAboutCustomersController::class,"index"])->name("admin.reviews.customers");

        /*Add admin Routes*/
        Route::get("add-admin",[AddAdminController::class,"index"])->name("admin.add.admins");
        Route::post("AdminAddUploadImage",[AddAdminController::class,"addImage"])->name("admin.add.upload.image");
        Route::post("AdminDeleteImage",[AddAdminController::class,"deleteImage"])->name("admin.delete.image");
        Route::post("addAdmin",[AddAdminController::class,"addAdmin"])->name("admin.post.add");

        /*Update admin profile controller*/
        Route::get("admin_update_account",[UpdateAdminAccountController::class,"index"])->name("admin.update.account");
        Route::post("updateProfile",[UpdateAdminAccountController::class,"updateProfile"])->name("admin.update");

    });
});
