<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Models\User;

class ReturnOrderInformationService extends \App\Services\Service
{

    public function ReturnOrderInfoByOrderID($request): \Illuminate\Database\Eloquent\Collection|array
    {
        return Order::with([
            'user' => function ($query) {
                $query->select('id', 'name',"phone");
            }, 'products'=> function($q){
                $q->distinct();
            },'products.images'
        ])->select("id","status_en as status","user_id")->where("id", $request->order_id)->get();
    }

    public function ReturnAllPreviousCustomerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return User::where("id",$user->id)->with([
            "orders" => function ($q)
            {
                $q->with("truck",function ($qq){
                    $qq->with("images");
                    $qq->select("delivery","delivery_price","id");
                });
                $q->whereIn('status_en',['delivered','cancelled','picked-up'])
                    ->select("status_en" ,"truck_id","user_id","created_at");
            },
        ])->select("id","name","phone")->get();
    }

    public function ReturnAllProcessingCustomerOrders()
    {
        $user = auth("sanctum")->user();
        return User::where("id",$user->id)->with(
            "orders",function ($q)
            {
                $q->with("truck",function ($qq){
                    $qq->with("images");
                    $qq->select("delivery","delivery_price","id");
                });
                $q->where('status','processing')->select("status","truck_id","user_id","created_at");
            }
        )->select("id","name","phone")->get();
    }

    public function ReturnAllPendingCustomerOrders()
    {
        $user = auth("sanctum")->user();
        return User::where("id",$user->id)->with(
            "orders",function ($q)
        {
            $q->with("truck",function ($qq){
                $qq->with("images");
                $qq->select("delivery","delivery_price","id");
            });
            $q->where('status','pending')->select("status","truck_id","user_id","created_at");
        }
        )->select("id","name","phone")->get();
    }

    public function ReturnAllCurrentSellerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Order::with(["truck" => function ($q) use ($user){
            $q->where("id",$user->truck->id);
            $q->with("images");
            $q->with("images");
            $q->select("delivery","delivery_price","id");
        }])->whereIn('status',['pending','processing'])->select("status","created_at","delivery_type","truck_id")->get();
    }

    public function ReturnAllPreviousSellerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Order::with(["truck" => function ($q) use ($user){
            $q->where("id",$user->truck->id);
            $q->with("images");
            $q->with("images");
            $q->select("delivery","delivery_price","id");
        }])->whereIn('status',['picked-up','cancelled','delivered'])->select("status","created_at","delivery_type","truck_id")->get();
    }
}
