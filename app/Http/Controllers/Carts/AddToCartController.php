<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\AddToCartRequest;
use App\Models\Cart;
use App\Services\Carts\AddToCartService;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{

    public function AddToCart(AddToCartRequest $request,AddToCartService $service): \Illuminate\Http\JsonResponse
    {
        $cart = $service->AddToCart($request);
        if ($cart){
            return $this->returnData("Cart_Products",$cart,"Product Added Successfully");
        }
        return $this->returnError("Some Thing Went Wrong.");
    }
}
