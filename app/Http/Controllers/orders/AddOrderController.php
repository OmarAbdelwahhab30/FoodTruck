<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\AddOrderRequest;
use App\Services\Orders\AddOrderService;
use Illuminate\Support\Facades\Gate;

class AddOrderController extends Controller
{

//    /**
//     * @throws AuthorizationException
//     */
    public function AddOrder(AddOrderRequest $request, AddOrderService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('add-order')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $added = $service->ExecTransaction($request);
        if ($added){
            return $this->returnData(__("Order"),$added,__("responses.Here is the Order"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
