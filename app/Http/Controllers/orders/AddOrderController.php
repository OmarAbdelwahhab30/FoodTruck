<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\AddOrderRequest;
use App\Services\Orders\AddOrderService;
use Illuminate\Http\Request;

class AddOrderController extends Controller
{

    public function addOrder(Request $request,AddOrderService $service)
    {
        $added = $service->ExecTransaction($request);
        return $added;
        if ($added){
            return $this->returnData("Order",$added,"Here is the Order");
        }
        return $this->returnError("SomeThing Went Wrong ,try again later");
    }
}
