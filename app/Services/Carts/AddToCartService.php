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
        $truck_id = $product->truck->id;
        $flag = false;
        if (!isset($cart)){

            $cart = Cart::create([
                'user_id'   => auth("sanctum")->user()->id,
                'truck_id'  => $truck_id,
            ]);
            $flag = true;
        }
        if ($flag === false){ // this means that there is a cart
            if ($product->truck->id != $cart->truck_id){
                return false;
            }
        }

        if (!$this->IsFoundInCart($request->product_id,$cart->id))
        {
            $cart->products()->attach($request->product_id,array('count' => $request->count));
        }else{
            $this->IncrementCount($request);
        }
        return $cart->products;
    }

    public function IsFoundInCart($product_id,$cart_id): bool
    {
        $found = Cart_Product::where("product_id",$product_id)->where("cart_id",$cart_id)->first();
        if ($found){
            return true;
        }
        return false;
    }

    private function IncrementCount($request):void
    {
        DB::table('cart_product')
            ->where('product_id', $request->product_id)
            ->update([
                'count' => $request->count,
            ]);
    }


}
