<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trucks\DeliveryStatusRequest;
use App\Http\Requests\Trucks\updateTruckInfoRequest;
use App\Services\Trucks\UpdateTruckInformationService;
use Illuminate\Support\Facades\Gate;

class UpdateTruckInformationController extends Controller
{

    public function UpdateTruckInformation(updateTruckInfoRequest $request,UpdateTruckInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("update-truck-info")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $updated = $service->exec($request);
        if ($updated)
        {
            return $this->returnSuccessMessage(__("responses.Truck information Has been updated successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function ChangeDeliveryStatus(DeliveryStatusRequest $request,UpdateTruckInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("change-delivery-status")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        return $service->ChangeDeliveryStatus($request);
    }
}
