<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maps\GetNearestTruckRequest;
use App\Services\Maps\GetNearestTrucksService;
use Illuminate\Support\Facades\Gate;

class GetNearestTrucksController extends Controller
{

    public function GetNearestTrucks(GetNearestTruckRequest $request ,GetNearestTrucksService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("find-nearest-trucks")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $trucks = $service->GetNearestTrucks($request);
        if ($trucks){
            return $this->returnData(__("Users"),$trucks,__("responses.Here are the nearest Trucks"));
        }
        return $this->returnError(__("responses.User must enter his location firstly"));
    }
}
