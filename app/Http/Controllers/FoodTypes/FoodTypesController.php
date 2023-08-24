<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Services\FoodTypes\FoodTypesService;
use Illuminate\Support\Facades\Gate;

class FoodTypesController extends Controller
{
    public function GetAllFoodTypes(FoodTypesService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("return-foodtypes")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        return $this->returnData(__("food_types"),$service->GetAllFoodTypes(),__("responses.Here are all food types"));
    }
}
