<?php

namespace App\Services\Orders;

use App\Events\Order\SendOrderStatusEvent;
use App\Models\Order;
use App\Services\Service;

class UpdateOrderStatusService extends Service
{

    public function AcceptOrder($request)
    {
        $order = Order::where("id", $request->order_id)->update([
            'status_en' => 'processing',
            'status_ar' => 'يتم تجهيزه',
        ]);
        $time = $this->GetCurrentTime();
        $this->broadCastOrderStatus($request->order_id,$time);
        $OrderUser = $this->getOrderUser($request->order_id);
        //$this->PushNotification($OrderUser->player_id,2,$OrderUser->id,false);
        return $order;
    }

    public function RejectOrder($request)
    {
        $order = Order::where("id", $request->order_id)->update([
            'status_en' => 'cancelled',
            'status_ar' => 'تم الإلغاء',
        ]);
        $time = $this->GetCurrentTime();
        $this->broadCastOrderStatus($request->order_id,$time);
        $OrderUser = $this->getOrderUser($request->order_id);
        //$this->PushNotification($OrderUser->player_id,4,$OrderUser->id,false);
        return $order;
    }

    public function OrderDelivered($request)
    {
        $order = Order::where("id", $request->order_id)->update([
            'status_en' => 'delivered',
            'status_ar' => 'تم التوصيل',
        ]);
        $time = $this->GetCurrentTime();
        $this->broadCastOrderStatus($request->order_id,$time);
        $OrderUser = $this->getOrderUser($request->order_id);
        //$this->PushNotification($OrderUser->player_id,5,$OrderUser->id,false);
        return $order;
    }

    public function OrderPickedUp($request)
    {
        $order = Order::where("id", $request->order_id)->update([
            'status_en' => 'picked-up',
            'status_ar' => 'تم الإستلام',
        ]);
        $time = $this->GetCurrentTime();
        $this->broadCastOrderStatus($request->order_id,$time);
        $OrderUser = $this->getOrderUser($request->order_id);
        //$this->PushNotification($OrderUser->player_id,3,$OrderUser->id,false);
        return $order;
    }

    public function getOrderUser($order_id)
    {
        return Order::find($order_id)->user;
    }

    public function broadCastOrderStatus($order_id,$time)
    {
        broadcast(new SendOrderStatusEvent($order_id,$time))->toOthers();
    }
}
