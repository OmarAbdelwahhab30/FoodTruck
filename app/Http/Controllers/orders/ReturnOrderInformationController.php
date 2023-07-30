<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\UpdateOrderStatusRequest;
use App\Services\Orders\ReturnOrderInformationService;
use Illuminate\Support\Facades\Gate;

class ReturnOrderInformationController extends Controller
{

    public function ReturnOrderInfoByOrderID(UpdateOrderStatusRequest $request,ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('get-order-by-id')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $order_Info = $service->ReturnOrderInfoByOrderID($request);
        if ($order_Info)
        {
            return $this->returnData(__("OrderInfo"),$order_Info,__("responses.Here is Order Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function ReturnAllPreviousCustomerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-customer-orders')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $Previous_orders = $service->ReturnAllPreviousCustomerOrders();
        if ($Previous_orders)
        {
            return $this->returnData(__("Previous_order"),$Previous_orders,__("responses.Here are previous Orders Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function ReturnAllProcessingCustomerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('responses.return-customer-orders')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $Processing_orders = $service->ReturnAllProcessingCustomerOrders();
        if ($Processing_orders)
        {
            return $this->returnData(__("Processing_orders"),$Processing_orders,__("responses.Here are Processing Orders Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }


    public function ReturnAllPendingCustomerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-customer-orders')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $Pending_orders = $service->ReturnAllPendingCustomerOrders();
        if ($Pending_orders)
        {
            return $this->returnData(__("Pending_orders"),$Pending_orders,__("responses.Here are Pending Orders Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function ReturnAllCurrentSellerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-truck-orders')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $current_orders = $service->ReturnAllCurrentSellerOrders();
        if ($current_orders)
        {
            return $this->returnData(__("current_orders"),$current_orders,__("responses.Here are Current Orders Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function ReturnAllPreviousSellerOrders(ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-truck-orders')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $previous_orders = $service->ReturnAllPreviousSellerOrders();

        if ($previous_orders)
        {
            return $this->returnData(__("Previous_order"),$previous_orders,__("responses.Here are previous Orders Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
