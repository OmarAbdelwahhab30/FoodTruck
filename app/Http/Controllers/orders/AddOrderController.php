<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\AddOrderRequest;
use App\Services\Orders\AddOrderService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AddOrderController extends Controller
{

//    /**
//     * @throws AuthorizationException
//     */
    public function addOrder(AddOrderRequest $request, AddOrderService $service): \Illuminate\Http\JsonResponse
    {

        //$this->authorize("add-order");
//        if (! Gate::allows('add-order')) {
//            return $this->notAuthorized("You don't have the authorization on this action");
//        }
        $added = $service->ExecTransaction($request);
        if ($added){
            return $this->returnData("Order",$added,"Here is the Order");
        }
        return $this->returnError("SomeThing Went Wrong ,try again later");
    }
}
