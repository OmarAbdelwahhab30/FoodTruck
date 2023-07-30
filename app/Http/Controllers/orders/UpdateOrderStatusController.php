<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\UpdateOrderStatusRequest;
use App\Services\Orders\UpdateOrderStatusService;
use Illuminate\Support\Facades\Gate;

class UpdateOrderStatusController extends Controller
{

    public function AcceptOrder(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('accept-order')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $accepted = $service->AcceptOrder($request);
        if ($accepted)
        {
            return $this->returnSuccessMessage(__("responses.Order is accepted from seller and it is being prepared now "));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function RejectOrder(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('reject-order')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $rejected = $service->RejectOrder($request);
        if ($rejected)
        {
            return $this->returnSuccessMessage(__("responses.Order is rejected from seller."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }


    public function OrderDelivered(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('order-delivered')) {
            return $this->notAuthorized(__("responses.responses.You don't have the authorization on this action."));
        }
        $Delivered = $service->OrderDelivered($request);
        if ($Delivered)
        {
            return $this->returnSuccessMessage(__("responses.Order is Delivered Successfully."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }


    public function OrderPickedUp(UpdateOrderStatusRequest $request,UpdateOrderStatusService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('order-pickedUp')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $PickedUp = $service->OrderPickedUp($request);
        if ($PickedUp)
        {
            return $this->returnSuccessMessage("responses.Order is Picked Up .");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

}
