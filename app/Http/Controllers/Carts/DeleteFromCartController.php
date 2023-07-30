<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\AddToCartRequest;
use App\Http\Requests\Carts\RemoveFromCartRequest;
use App\Services\Carts\AddToCartService;
use App\Services\Carts\DeleteFromCartService;
use Illuminate\Support\Facades\Gate;

class DeleteFromCartController extends Controller
{

    public function RemoveProductFromCart(RemoveFromCartRequest $request,DeleteFromCartService $service): \Illuminate\Http\JsonResponse
    {
//        if (!Gate::allows('remove-from-cart')){
//            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
//        }
        $cart = $service->deleteProductFromCart($request);
        if ($cart){
            return $this->returnSuccessMessage(__("responses.Product has been removed successfully."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
