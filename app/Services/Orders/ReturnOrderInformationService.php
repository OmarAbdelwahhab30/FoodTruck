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
        return Order::with([
            'user' => function ($query)  {
                $query->select('id', 'name',"phone");
            }, "truck" => function($q){
                $q->select("id","user_id");
            },
            'products' => function ($p) use($request){
                $p->with(['orderProduct' => function ($pivot) use($request) {
                        $pivot->with('size:id,size,price'); // Eager load the 'size' relationship from the pivot model
                        $pivot->where("order_id",$request->order_id);
                }]);
            },
            'products.images' => function($image){
                $image->select("id","product_id","image");
            }
        ])->select("id","status_".app()->getLocale()." as status"
            ,"user_id","delivery_type_".app()->getLocale()." as delivery_type"
            ,"total_price","truck_id","created_at","updated_at","payment_id")->where("id", $request->order_id)->get();
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
                    ->select("id","delivery_type_".app()->getLocale()." as delivery_type","status_".app()->getLocale()." as status"
                        ,"truck_id","user_id","created_at","payment_id","total_price");
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
                    ->select("id","delivery_type_".app()->getLocale()." as delivery_type",
                        "status_".app()->getLocale()." as status","truck_id","user_id","created_at","payment_id","total_price");
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
            $q->where('status_en','pending')->select("id","status_".app()->getLocale()." as status",
                "truck_id","user_id","created_at","delivery_type_".app()->getLocale()." as delivery_type","payment_id","total_price");
        }
        )->select("id","name","phone")->get();
    }

    public function ReturnAllCurrentSellerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Order::where("user_id",$user->id)->with(["user" => function ($qq) use ($user){
            $qq->select("id","name","image","phone");
        }])->with(["truck" => function ($q) use ($user){
            $q->where("id",$user->truck->id);
            $q->with("images");
            $q->with("images");
            $q->select("name","delivery","delivery_price","id");
        }])->whereIn('status_en',['pending','processing'])
            ->select("id","user_id","status_".app()->getLocale()." as status"
                ,"created_at","delivery_type_".app()->getLocale()." as delivery_type","truck_id",
                "payment_id","total_price")->get();
    }

    public function ReturnAllPreviousSellerOrders(): \Illuminate\Database\Eloquent\Collection|array
    {
        $user = auth("sanctum")->user();
        return Order::where("user_id",$user->id)->with(["user" => function ($qq){
            $qq->select("id","name","image","phone");
        }])->with(["truck" => function ($q) use ($user){
            $q->where("id",$user->truck->id);
            $q->with("images");
            $q->with("images");
            $q->select("name","delivery","delivery_price","id");
        }])->whereIn('status_en',['picked-up','cancelled','delivered'])
            ->select("id","status_".app()->getLocale()." as status","created_at"
                ,"delivery_type_".app()->getLocale()." as delivery_type"
                ,"truck_id","user_id","payment_id","total_price")->get();
    }

    public function ReturnOrderStatusByOrderID($request)
    {
        $order =  Order::where("id",$request->order_id)->select("status_".app()->getLocale()." as status")->first();
        broadcast(new SendOrderStatusEvent($request->order_id));
        return $order;
    }
}
