<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Services\Trucks\ShowAllTrucksService;
use Illuminate\Support\Facades\Gate;

class ShowAllTrucksController extends Controller
{

    public function GetAllTrucks(ShowAllTrucksService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-all-trucks")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $trucks = $service->GetAllTrucks();
        if (!empty($trucks)){
            return $this->returnData(__("Trucks"),$trucks,__("responses.Here are All Trucks."));
        }
        return $this->returnError(__("responses.There is no trucks to show"));
    }
}
