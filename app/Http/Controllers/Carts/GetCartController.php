<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\AddToCartRequest;
use App\Http\Requests\Carts\GetCartRequest;
use App\Models\Cart;
use App\Services\Carts\AddToCartService;
use App\Services\Carts\GetCartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GetCartController extends Controller
{

    public function GetCart(GetCartRequest $request,GetCartService $service): \Illuminate\Http\JsonResponse
    {
        $products = $service->GetCart($request);
        if ($products){
            return $this->returnData("Cart_Products",$products,"Here Are Products in the cart");
        }
        return $this->returnError("Some Thing Went Wrong.");
    }
}
