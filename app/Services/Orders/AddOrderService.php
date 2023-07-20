<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class AddOrderService extends Service
{


        public function ExecTransaction($request)
        {
            return DB::transaction(function () use ($request){

                $order = $this->addOrder($request);
                $this->attachProduct($request->products,$order);

                return Order::where("id",$order->id)->with("products",function ($q) {

                })->get();
            });
        }


    public function addOrder($request)
    {
        return Order::create([
            'truck_id'      => $request->truck_id ,
            'arrival_time'  => $request->arrival_time,
            'delivery_type' => $request->delivery_type,
            'total_price'   => $request->total_price,
        ]);
    }
    public function attachProduct($products,$order)
    {
        foreach ($products as $product)
        $order->products()->attach($product['id'], ['optional' => $product['optional']]);

    }

}
