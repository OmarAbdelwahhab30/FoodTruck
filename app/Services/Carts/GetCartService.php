<?php

namespace App\Services\Carts;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_Product;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetCartService extends Service
{


    public function GetCart($request): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Cart::with(["products" => function($q){
            $q->select("name","products.id");

            $q->with("images" , function ($qq){
                $qq->select("*");
            });
            $q->with("sizes");
            $q->with("optionals");
        }])->where("id",$request->cart_id)->where("user_id",$user->id)->select("id")->get();
    }
}
