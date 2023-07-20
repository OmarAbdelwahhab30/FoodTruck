<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\UpdateOrderStatusRequest;
use App\Services\Orders\UpdateOrderStatusService;

class UpdateOrderStatusController extends Controller
{


    public function AcceptOrder(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        $accepted = $service->AcceptOrder($request);
        if ($accepted)
        {
            return $this->returnSuccessMessage("Order is accepted from seller and it is being prepared now ");
        }
        return $this->returnError("Something went wrong , try again later");
    }

    public function RejectOrder(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        $rejected = $service->RejectOrder($request);
        if ($rejected)
        {
            return $this->returnSuccessMessage("Order is rejected from seller.");
        }
        return $this->returnError("Something went wrong , try again later");
    }


    public function OrderDelivered(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        $Delivered = $service->OrderDelivered($request);
        if ($Delivered)
        {
            return $this->returnSuccessMessage("Order is Delivered Successfully.");
        }
        return $this->returnError("Something went wrong , try again later");
    }


    public function OrderPickedUp(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        $PickedUp = $service->OrderPickedUp($request);
        if ($PickedUp)
        {
            return $this->returnSuccessMessage("Order is Picked Up .");
        }
        return $this->returnError("Something went wrong , try again later");
    }

}
