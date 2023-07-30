<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\AddToCartRequest;
use App\Services\Carts\AddToCartService;
use Illuminate\Support\Facades\Gate;

class AddToCartController extends Controller
{

    public function AddToCart(AddToCartRequest $request,AddToCartService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows('add-to-cart')){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $cart = $service->AddToCart($request);
        if ($cart){
            return $this->returnData(__("Cart_Products"),$cart,__("responses.Product Added Successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
