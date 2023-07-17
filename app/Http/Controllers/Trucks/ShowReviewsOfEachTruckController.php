<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Services\Trucks\ShowReviewsOfEachTruckService;
use Illuminate\Http\Request;

class ShowReviewsOfEachTruckController extends Controller
{
    public function GetTruckReviewsByID(Request $request,ShowReviewsOfEachTruckService $service): \Illuminate\Http\JsonResponse
    {
        $Truck_Review = $service->GetTruckReviewsByID($request->id);
        if (!empty($Truck_Review)){
            return $this->returnData("Truck Review",$Truck_Review,"Here is the truck.");
        }
        return $this->returnError("There is no reviews");
    }
}
