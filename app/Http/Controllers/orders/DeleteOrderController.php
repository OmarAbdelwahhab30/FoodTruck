<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Services\Orders\DeleteOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeleteOrderController extends Controller
{


    public function cancelOrderByID(DeleteOrderRequest $request,DeleteOrderService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('cancel-order-by-id')) {
            return $this->notAuthorized("You don't have the authorization on this action");
        }
        $cancelled = $service->cancelOrderById($request);
        if ($cancelled){
            return $this->returnSuccessMessage("Order has been cancelled successfully");
        }
        return $this->returnError("Something Went Wrong");
    }
}
