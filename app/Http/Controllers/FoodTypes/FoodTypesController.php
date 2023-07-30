<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Services\FoodTypes\FoodTypesService;

class FoodTypesController extends Controller
{
    public function GetAllFoodTypes(FoodTypesService $service): \Illuminate\Http\JsonResponse
    {
        return $this->returnData(__("food_types"),$service->GetAllFoodTypes(),__("responses.Here are all food types"));
    }
}
