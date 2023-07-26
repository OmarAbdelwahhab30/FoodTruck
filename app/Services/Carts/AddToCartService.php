<?php

namespace App\Services\Carts;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_Product;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddToCartService extends Service
{


    public function AddToCart($request)
    {
        $cart = auth("sanctum")->user()->cart;
        if (!isset($cart)){
            $cart = Cart::create([
                'user_id'   => auth("sanctum")->user()->id,
            ]);
        }
        if ($this->IsFoundInCart($request->product_id))
        {
           $this->IncrementCount($request->product_id);
        }else
        {
            $cart->products()->attach($request->product_id);
        }
        return $cart->products;
    }

    public function IsFoundInCart($product_id): bool
    {
        $found = Cart_Product::where("product_id",$product_id)->first();
        if ($found){
            return true;
        }
        return false;
    }

    private function IncrementCount($product_id):void
    {
        DB::table('cart_product')
            ->where('product_id', $product_id)
            ->update([
                'count' => DB::raw('count + 1'),
            ]);
    }
}
