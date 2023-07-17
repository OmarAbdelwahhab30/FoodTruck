<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Services\Products\ShowDetailsOfEachProductService;
use App\Services\Trucks\ShowDetailsOfEachTruckService;
use App\Services\Trucks\ShowReviewsOfEachTruckService;
use Illuminate\Http\Request;

class ShowDetailsOfEachTruckController extends Controller
{
    public function GetDetailsOfEachTruckByID(Request $request,ShowDetailsOfEachTruckService $service)
    {
        $truck = $service->GetTruckDetailsByID($request->id);
        if (!empty($truck)){
            return $this->returnData("Truck",$truck,"Here is the truck.");
        }
        return $this->returnError("There is no details");
    }
}
