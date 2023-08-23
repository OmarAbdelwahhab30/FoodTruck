<?php

namespace App\Services\Carts;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_Product;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddToCartService extends Service
{


    public function AddToCart($request)
    {
        $cart = auth("sanctum")->user()->cart;

        $product = Product::find($request->product_id);
        $Product_truck_id = $product->truck->id;
        if (!$this->HandleCart($Product_truck_id, $cart)){
            return false;
        }
        $cart->products()->attach($request->product_id, array(
            'count' => $request->count,
            'size_id' => $request->size_id,
            'optional' => $request->optionals,
            'optional_price' => $request->optional_price,
            'total_price' => $request->total_price,
        ));
        return $cart->products;
    }

    private function HandleCart($Product_truck_id,$cart){
        if ($cart->truck_id !== null) {
            if ($cart->truck_id !== $Product_truck_id) {
                return false;
            }
        }elseif ($cart->truck_id  == null){
            $cart->truck_id = $Product_truck_id;
            $cart->save();
        }
        return true;
    }
}
