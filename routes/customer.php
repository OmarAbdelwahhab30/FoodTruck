<?php

use App\Http\Controllers\FoodTypes\ShowAllProductsInsideEachSectionController;
use App\Http\Controllers\FoodTypes\ShowAllSectionsController;
use App\Http\Controllers\Trucks\ShowAllTrucksController;
use App\Http\Controllers\Trucks\ShowDetailsOfEachTruckController;
use App\Http\Controllers\Trucks\ShowReviewsOfEachTruckController;
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

Route::middleware("auth:sanctum")->group(function (){
    Route::get("GetAllTrucks",[ShowAllTrucksController::class,"GetAllTrucks"]);
    Route::get("GetTruckByID",[ShowDetailsOfEachTruckController::class,"GetDetailsOfEachTruckByID"]);
    Route::get("GetTruckReviewsByID",[ShowReviewsOfEachTruckController::class,"GetTruckReviewsByID"]);
    Route::get("GetAllSectionInsideEachTruckByID",[ShowAllSectionsController::class,"GetAllSectionInsideEachTruckByID"]);
    Route::get("GetAllProductsInsideEachSectionByID",[ShowAllProductsInsideEachSectionController::class,"GetAllProductsInsideEachSectionByID"]);
});
