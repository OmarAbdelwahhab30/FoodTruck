<?php

use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\Reviews\AddCustomerReviewsController;
use App\Http\Controllers\Reviews\AddTruckReviewsController;
use App\Http\Controllers\Reviews\GetAllReviewsController;
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

    Route::post("AddTruckReview", [AddTruckReviewsController::class, "AddTruckReview"]);
    Route::post("AddCustomerReview", [AddCustomerReviewsController::class, "AddCustomerReview"]);
    Route::get("GetTrucksReviews",[GetAllReviewsController::class,"GetTrucksReviews"]);
    Route::get("GetCustomersReviews",[GetAllReviewsController::class,"GetCustomersReviews"]);

});
