<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Services\Trucks\ShowAllTrucksService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShowAllTrucksController extends Controller
{

    public function GetAllTrucks(ShowAllTrucksService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-all-trucks")){
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $trucks = $service->GetAllTrucks();
        if (!empty($trucks)){
            return $this->returnData("Trucks",$trucks,"Here are All Trucks.");
        }
        return $this->returnError("There is no trucks to show");
    }
}
