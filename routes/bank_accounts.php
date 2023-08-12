<?php


use App\Http\Controllers\BankAccounts\BankAccountController;
use App\Http\Controllers\cashout\CashoutController;
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

    Route::post("AddBankAccount",[BankAccountController::class,"addBankAccountInfo"]);

    Route::get("returnSellerBankAccounts",[BankAccountController::class,"returnBankInfo"]);

    Route::post("ExecuteCashoutRequest",[CashoutController::class,"ExecuteCashout"]);
});
