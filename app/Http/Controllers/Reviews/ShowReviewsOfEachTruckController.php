<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\GetTruckReviewRequest;
use App\Services\Reviews\ShowReviewsOfEachTruckService;
use Illuminate\Support\Facades\Gate;

class ShowReviewsOfEachTruckController extends Controller
{
    public function GetTruckReviewsByID(GetTruckReviewRequest $request,ShowReviewsOfEachTruckService $service): \Illuminate\Http\JsonResponse
    {
        if(!Gate::allows("get-truck-review-by-id")) {
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $Truck_Reviews = $service->GetTruckReviewsByID($request->id);
        if ($Truck_Reviews) {
            return $this->returnData("Truck Reviews", $Truck_Reviews, "Here is the truck Reviews.");
        }
        return $this->returnError("There is no reviews");
    }
}
