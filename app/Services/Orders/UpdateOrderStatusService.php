<?php

namespace App\Services\Orders;

use App\Events\Order\SendOrderStatusEvent;
use App\Models\Order;
use App\Services\Service;

class UpdateOrderStatusService extends Service
{

    public function AcceptOrder($request)
    {
        $order =  Order::where("id",$request->order_id)->update([
           'status_en' => 'processing',
        ]);
        $this->broadCastOrderStatus($request->order_id,auth("sanctum")->user());
        $OrderUser = $this->getOrderUser($request->order_id);
        $this->PushNotification($OrderUser->player_id,2,false);
        return $order;
    }

    public function RejectOrder($request)
    {
        $order = Order::where("id",$request->order_id)->update([
            'status_en' => 'cancelled',
        ]);
        $this->broadCastOrderStatus($request->order_id,auth("sanctum")->user());
        $OrderUser = $this->getOrderUser($request->order_id);
        $this->PushNotification($OrderUser->player_id,4,false);
        return $order;
    }

    public function OrderDelivered($request){
        $order =  Order::where("id",$request->order_id)->update([
            'status_en' => 'delivered',
        ]);
        $this->broadCastOrderStatus($request->order_id,auth("sanctum")->user());
        $OrderUser = $this->getOrderUser($request->order_id);
        $this->PushNotification($OrderUser->player_id,5,false);
        return $order;
    }

    public function OrderPickedUp($request){
        $order = Order::where("id",$request->order_id)->update([
            'status_en' => 'picked-up',
        ]);
        $this->broadCastOrderStatus($request->order_id,auth("sanctum")->user());
        $OrderUser = $this->getOrderUser($request->order_id);
        $this->PushNotification($OrderUser->player_id,3,false);
        return $order;
    }

    public function getOrderUser($order_id)
    {
        return Order::find($order_id)->user;
    }
    public function broadCastOrderStatus($order_id,$user)
    {
        broadcast(new SendOrderStatusEvent($order_id,$user))->toOthers();
    }
}
