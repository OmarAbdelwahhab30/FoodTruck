<?php

use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\notifications\SetPlayerIdController;
use App\Http\Controllers\Payment\PayPal\PaymentController;
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

Route::post("AddContactUsContent",[ContactUsController::class,'AddContactUsContent']);
Route::post("setPlayerID",[SetPlayerIdController::class,"setPlayerID"]);

