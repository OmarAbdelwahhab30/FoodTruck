<?php

use App\Http\Controllers\Auth\UpdateAccountInformation\UpdateAccountInformationController;
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

Route::post("login",[\App\Http\Controllers\Auth\LoginController::class,"login"]);
Route::post("seller_register",[\App\Http\Controllers\Auth\SellerRegisterController::class,"register"]);
Route::post("customer_register",[\App\Http\Controllers\Auth\CustomerRegisterController::class,"register"]);
Route::post("logout",[\App\Http\Controllers\Auth\LogoutController::class,"logout"])->middleware("auth:sanctum");;

Route::group(['middleware' => 'auth:sanctum'],function () {
    Route::post("UpdateAccountInformation", [UpdateAccountInformationController::class, 'UpdateAccountInformation']);
    Route::post("changepassword", [UpdateAccountInformationController::class, 'ChangePassword']);
});
