<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Services\Trucks\ShowAllTrucksService;
use Illuminate\Http\Request;

class ShowAllTrucksController extends Controller
{

    public function GetAllTrucks(ShowAllTrucksService $service): \Illuminate\Http\JsonResponse
    {
        $trucks = $service->GetAllTrucks();
        if (!empty($trucks)){
            return $this->returnData("Trucks",$trucks,"Here are All Trucks.");
        }
        return $this->returnError("There is no trucks to show");
    }
}
