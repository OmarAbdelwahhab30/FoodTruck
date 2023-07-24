<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Services\Maps\GetNearestTrucksService;
use Illuminate\Http\Request;

class GetNearestTrucksController extends Controller
{

    public function GetNearestTrucks(Request $request ,GetNearestTrucksService $service)
    {
        $trucks = $service->GetNearestTrucks($request);
        if ($trucks){
            return $this->returnData("Trucks",$trucks,"Here Are the nearest Trucks");
        }
        return $this->returnError("SomeThing Went Wrong , Try again later.");
    }
}
