<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\ShowTruckSectionsRequest;
use App\Services\FoodTypes\ShowAllSectionsService;
use Illuminate\Http\Request;

class ShowAllSectionsController extends Controller
{

    public function GetAllSectionInsideEachTruckByID(ShowTruckSectionsRequest $request,ShowAllSectionsService $service): \Illuminate\Http\JsonResponse
    {
        $FoodTypes = $service->GetAllSectionInsideEachTruckByID($request);
        if (!empty($FoodTypes)){
            return $this->returnData("Sections",$FoodTypes,"Here are All Section inside this truck.");
        }
        return $this->returnError("There is no food types to show");
    }
}
