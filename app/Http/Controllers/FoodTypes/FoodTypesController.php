<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Services\FoodTypes\FoodTypesService;
use Illuminate\Http\Request;

class FoodTypesController extends Controller
{
    public function GetAllFoodTypes(FoodTypesService $service): \Illuminate\Http\JsonResponse
    {
        return $this->returnData("food_types",$service->GetAllFoodTypes(),"Here are all food types");
    }
}
