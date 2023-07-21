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
            }, 'products','products.images'
        ])->where("id", $request->order_id)->get();
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
                $q->whereIn('status',['delivered','cancelled','picked-up'])
                    ->select("status","truck_id","user_id","created_at");
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
}
