<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\GetTruckRequest;
use App\Models\User;
use App\Services\Trucks\ShowDetailsOfEachTruckService;
use Illuminate\Support\Facades\Gate;

class ShowDetailsOfEachTruckController extends Controller
{
    public function GetDetailsOfEachTruckByID(GetTruckRequest $request,ShowDetailsOfEachTruckService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-truck-by-id")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $truck = $service->GetTruckDetailsByID($request->id);
        if (!empty($truck)){
            return $this->returnData("Truck",$truck,__("responses.Here is the truck information."));
        }
        return $this->returnError("responses.There is no details");
    }

    public function GetDeliveryStatus(ShowDetailsOfEachTruckService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-truck-by-id")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $status = $service->GetDeliveryStatus();
        return $this->returnData("delivery_status",$status,"");
    }

}
