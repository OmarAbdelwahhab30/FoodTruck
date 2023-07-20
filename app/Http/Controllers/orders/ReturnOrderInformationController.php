<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\UpdateOrderStatusRequest;
use App\Services\Orders\ReturnOrderInformationService;
use Illuminate\Http\Request;

class ReturnOrderInformationController extends Controller
{

    public function ReturnOrderInfoByOrderID(UpdateOrderStatusRequest $request,ReturnOrderInformationService $service): \Illuminate\Http\JsonResponse
    {
        $order_Info = $service->ReturnOrderInfoByOrderID($request);
        if ($order_Info)
        {
            return $this->returnData("OrderInfo",$order_Info,"Here is Order Info");
        }
        return $this->returnError("SomeThing Went Wrong,try again later");
    }
}
