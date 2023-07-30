<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\GetCartRequest;
use App\Services\Carts\GetCartService;

class GetCartController extends Controller
{

    public function GetCart(GetCartRequest $request,GetCartService $service): \Illuminate\Http\JsonResponse
    {
        $products = $service->GetCart($request);
        if ($products){
            return $this->returnData(__("Cart_Products"),$products,__("responses.Here Are Products in the cart"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
