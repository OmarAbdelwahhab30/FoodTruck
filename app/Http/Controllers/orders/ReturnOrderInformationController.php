<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\UpdateOrderStatusRequest;
use App\Services\Orders\ReturnOrderInformationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReturnOrderInformationController extends Controller
{

    public function ReturnOrderInfoByOrderID(UpdateOrderStatusRequest $request,ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('get-order-by-id')) {
            return $this->notAuthorized("You don't have the authorization on this action");
        }
        $order_Info = $service->ReturnOrderInfoByOrderID($request);
        if ($order_Info)
        {
            return $this->returnData("OrderInfo",$order_Info,"Here is Order Info");
        }
        return $this->returnError("SomeThing Went Wrong,try again later");
    }

    public function ReturnAllPreviousCustomerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-customer-orders')) {
            return $this->notAuthorized("You don't have the authorization on this action");
        }
        $Previous_orders = $service->ReturnAllPreviousCustomerOrders();
        if ($Previous_orders)
        {
            return $this->returnData("Previous_order",$Previous_orders,"Here are previous Orders Info");
        }
        return $this->returnError("SomeThing Went Wrong,try again later");
    }

    public function ReturnAllProcessingCustomerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-customer-orders')) {
            return $this->notAuthorized("You don't have the authorization on this action");
        }
        $Processing_orders = $service->ReturnAllProcessingCustomerOrders();
        if ($Processing_orders)
        {
            return $this->returnData("Processing_orders",$Processing_orders,"Here are Processing Orders Info");
        }
        return $this->returnError("SomeThing Went Wrong,try again later");
    }


    public function ReturnAllPendingCustomerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-customer-orders')) {
            return $this->notAuthorized("You don't have the authorization on this action");
        }
        $Pending_orders = $service->ReturnAllPendingCustomerOrders();
        if ($Pending_orders)
        {
            return $this->returnData("Pending_orders",$Pending_orders,"Here are Pending Orders Info");
        }
        return $this->returnError("SomeThing Went Wrong,try again later");
    }
}
