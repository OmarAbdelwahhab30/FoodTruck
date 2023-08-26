<?php

use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SellerRegisterController;
use App\Http\Controllers\Auth\UpdateAccountInformation\UpdateAccountInformationController;
use App\Http\Controllers\FoodTypes\FoodTypesController;
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

Route::post("login",[LoginController::class,"login"]);

Route::post("seller_register",[SellerRegisterController::class,"register"]);

Route::post("customer_register",[CustomerRegisterController::class,"register"]);

Route::post("logout",[LogoutController::class,"logout"])->middleware("auth:sanctum");;

Route::post("ForgetPassword",[ForgetPasswordController::class,"createNewPassword"]);

Route::post("IsPhoneNumberExists", [ForgetPasswordController::class, 'IsPhoneNumberExists']);

Route::group(['middleware' => 'auth:sanctum'],function () {

    Route::post("UpdateAccountInformation", [UpdateAccountInformationController::class, 'UpdateAccountInformation']);

    Route::post("changepassword", [UpdateAccountInformationController::class, 'ChangePassword']);
});

Route::get("GetAllFoodTypes",[FoodTypesController::class,"GetAllFoodTypes"]);



