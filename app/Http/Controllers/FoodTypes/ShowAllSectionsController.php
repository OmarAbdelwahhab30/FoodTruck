<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Services\FoodTypes\ShowAllSectionsService;
use Illuminate\Http\Request;

class ShowAllSectionsController extends Controller
{

    public function GetAllSectionInsideEachTruckByID(Request $request,ShowAllSectionsService $service)
    {
        $FoodTypes = $service->GetAllSectionInsideEachTruckByID($request);
        if (!empty($FoodTypes)){
            return $this->returnData("Sections",$FoodTypes,"Here are All Section inside this truck.");
        }
        return $this->returnError("There is no food types to show");
    }
}
