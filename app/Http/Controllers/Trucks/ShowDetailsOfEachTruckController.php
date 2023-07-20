<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\GetTruckRequest;
use App\Services\Products\ShowDetailsOfEachProductService;
use App\Services\Trucks\ShowDetailsOfEachTruckService;

class ShowDetailsOfEachTruckController extends Controller
{
    public function GetDetailsOfEachTruckByID(GetTruckRequest $request,ShowDetailsOfEachTruckService $service): \Illuminate\Http\JsonResponse
    {
        $truck = $service->GetTruckDetailsByID($request->id);
        if (!empty($truck)){
            return $this->returnData("Truck",$truck,"Here is the truck.");
        }
        return $this->returnError("There is no details");
    }
}
