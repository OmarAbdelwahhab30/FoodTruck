<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\GetTruckReviewRequest;
use App\Services\Reviews\ShowReviewsOfEachTruckService;

class ShowReviewsOfEachTruckController extends Controller
{
    public function GetTruckReviewsByID(GetTruckReviewRequest $request,ShowReviewsOfEachTruckService $service): \Illuminate\Http\JsonResponse
    {
        $Truck_Reviews = $service->GetTruckReviewsByID($request->id);
        if ($Truck_Reviews) {
            return $this->returnData("Truck Reviews", $Truck_Reviews, "Here is the truck Reviews.");
        }
        return $this->returnError("There is no reviews");
    }
}
