<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\updateFoodTypeRequest;
use App\Services\FoodTypes\AddFoodTypeService;
use App\Services\FoodTypes\UpdateFoodTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UpdateFoodTypeController extends Controller
{

    public function updateFoodType(updateFoodTypeRequest $request,UpdateFoodTypeService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("update-foodtype")){
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $food_Type = $service->updateFoodType($request);
        if($food_Type){
            return $this->returnSuccessMessage("Food Type has been updated successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
