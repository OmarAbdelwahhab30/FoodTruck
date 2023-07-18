<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trucks\DeliveryStatusRequest;
use App\Http\Requests\Trucks\updateTruckInfoRequest;
use App\Services\Trucks\UpdateTruckInformationService;
use Illuminate\Http\Request;

class UpdateTruckInformationController extends Controller
{

    public function UpdateTruckInformation(updateTruckInfoRequest $request,UpdateTruckInformationService $service): \Illuminate\Http\JsonResponse
    {
        $updated = $service->exec($request);
        if ($updated)
        {
            return $this->returnSuccessMessage("Truck Information Has Been Updated Successfully");
        }
        return $this->returnError("Some Thing Went Wrong");
    }

    public function ChangeDeliveryStatus(DeliveryStatusRequest $request,UpdateTruckInformationService $service): \Illuminate\Http\JsonResponse
    {
        $done = $service->ChangeDeliveryStatus($request);
        if ($done){
            return $this->returnSuccessMessage("Truck delivery status has been updated successfully.");
        }
        return $this->returnError("Something went Wrong");
    }
}
