<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\GetCartRequest;
use App\Services\Carts\GetCartService;
use Illuminate\Support\Facades\Gate;

class GetCartController extends Controller
{

    public function GetCart(GetCartRequest $request,GetCartService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows('Get-Cart')){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $products = $service->GetCart($request);
        if ($products){
            return $this->returnData(__("Cart_Products"),$products,__("responses.Here Are Products in the cart"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
