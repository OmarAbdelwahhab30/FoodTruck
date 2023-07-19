<?php

use App\Http\Controllers\ContactUs\ContactUsController;
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

Route::post("AddTruckReview",[\App\Http\Controllers\Reviews\AddTruckReviewsController::class,"AddTruckReview"]);
Route::post("AddCustomerReview",[\App\Http\Controllers\Reviews\AddCustomerReviewsController::class,"AddCustomerReview"]);
