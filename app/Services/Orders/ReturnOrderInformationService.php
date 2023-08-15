<?php

namespace App\Services\Orders;

use App\Events\Order\SendOrderStatusEvent;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;

class ReturnOrderInformationService extends \App\Services\Service
{

    public function ReturnOrderInfoByOrderID($request): \Illuminate\Database\Eloquent\Collection|array
    {
        //$order = new Order();
        //return $order->through("products")->has("size");

        //return OrderProduct::where("order_id",$request->order_id)->with("size")->get();
        return Order::with([
            'user' => function ($query) {
                $query->select('id', 'name',"phone");
            },
            'products' => function ($p) {
                $p->with(['orderProduct' => function ($pivot) {
                        $pivot->with('size:id,size'); // Eager load the 'size' relationship from the pivot model
                    }]);
            },
            'products.images' => function($image){
                $image->select("id","product_id","image");
            }
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
                    $qq->select("name","delivery","delivery_price","id");
                });
                $q->whereIn('status_en',['delivered','cancelled','picked-up'])
                    ->select("id","status_en" ,"truck_id","user_id","created_at");
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
                    $qq->select("name","delivery","delivery_price","id");
                });
                $q->where('status_en','processing')
                    ->select("id","status_en","truck_id","user_id","created_at");
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
                $qq->select("name","delivery","delivery_price","id");
            });
            $q->where('status_en','pending')->select("id","status_en","truck_id","user_id","created_at");
        }
        )->select("id","name","phone")->get();
    }

    public function ReturnAllCurrentSellerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Order::with(["user" => function ($qq){
            $qq->select("id","name","image","phone");
        }])->with(["truck" => function ($q) use ($user){
            $q->where("id",$user->truck->id);
            $q->with("images");
            $q->with("images");
            $q->select("name","delivery","delivery_price","id");
        }])->whereIn('status_en',['pending','processing'])
            ->select("id","user_id","status_en","created_at","delivery_type_en","truck_id")->get();
    }

    public function ReturnAllPreviousSellerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Order::with(["user" => function ($qq){
            $qq->select("id","name","image","phone");
        }])->with(["truck" => function ($q) use ($user){
            $q->where("id",$user->truck->id);
            $q->with("images");
            $q->with("images");
            $q->select("name","delivery","delivery_price","id");
        }])->whereIn('status_en',['picked-up','cancelled','delivered'])
            ->select("id","status_en","created_at","delivery_type_en","truck_id","user_id")->get();
    }

    public function ReturnOrderStatusByOrderID($request)
    {
        $order =  Order::where("id",$request->order_id)->select("status_en","status_ar")->first();
        broadcast(new SendOrderStatusEvent($request->order_id));
        return $order;
    }
}
