<?php

namespace App\Services\Carts;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_Product;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteFromCartService extends Service
{
    public function deleteProductFromCart($request): bool
    {
        $cart = auth("sanctum")->user()->cart;
        if ($cart->products()->wherePivot('id', '=', $request->pivot_id)->detach())
        {
            if (!$cart->products->first()){
                $cart->truck_id = null;
                $cart->save();
            }
            return true;
        }
        return false;

    }
}
