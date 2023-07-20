<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Services\Service;

class UpdateOrderStatusService extends Service
{


    public function AcceptOrder($request)
    {
        return Order::where("id",$request->order_id)->update([
           'status' => 'processing',
        ]);
    }

    public function RejectOrder($request)
    {
        return Order::where("id",$request->order_id)->update([
            'status' => 'cancelled',
        ]);
    }

    public function OrderDelivered($request){
        return Order::where("id",$request->order_id)->update([
            'status' => 'delivered',
        ]);
    }

    public function OrderPickedUp($request){
        return Order::where("id",$request->order_id)->update([
            'status' => 'picked-up',
        ]);
    }

}
