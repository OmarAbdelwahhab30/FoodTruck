<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\addFoodTypeRequest;
use App\Services\FoodTypes\AddFoodTypeService;
use Illuminate\Http\Request;

class AddFoodTypeController extends Controller
{

    public function addFoodType(addFoodTypeRequest $request,AddFoodTypeService $service): \Illuminate\Http\JsonResponse
    {
        $food_Type = $service->addFoodType($request);
        if($food_Type){
            return $this->returnData("Food Type",$food_Type,"Food Type has been added successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
