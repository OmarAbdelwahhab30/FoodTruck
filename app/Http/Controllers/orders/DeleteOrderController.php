<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Services\Orders\DeleteOrderService;
use Illuminate\Http\Request;
class DeleteOrderController extends Controller
{


    public function cancelOrderByID(DeleteOrderRequest $request,DeleteOrderService $service): \Illuminate\Http\JsonResponse
    {
        $cancelled = $service->cancelOrderById($request);
        if ($cancelled){
            return $this->returnSuccessMessage("Order has been cancelled successfully");
        }
        return $this->returnError("Something Went Wrong");
    }
}
