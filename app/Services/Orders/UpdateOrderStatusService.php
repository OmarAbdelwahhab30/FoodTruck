<?php

namespace App\Services\Orders;

use App\Abstracts\Notification;
use App\Events\Order\SendOrderStatusEvent;
use App\Models\Order;
use App\Services\Service;
use App\Traits\PushNotificationTrait;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;

class UpdateOrderStatusService extends Service
{
    use PushNotificationTrait;

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function AcceptOrder($request)
    {
        $order = Order::where("id", $request->order_id)->update([
            'status_en' => 'processing',
            'status_ar' => 'يتم تجهيزه',
        ]);
        $time = $this->GetCurrentTime();
        $this->broadCastOrderStatus($request->order_id,$time);
        $OrderUser = $this->getOrderUser($request->order_id);
        $this->PushNotification(
            $OrderUser->device_token,
            Notification::OrderAccepted,
            $OrderUser->id,
            auth("sanctum")->user()->id,
        );
        return $order;
    }

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function RejectOrder($request)
    {
        $order = Order::where("id", $request->order_id)->update([
            'status_en' => 'cancelled',
            'status_ar' => 'تم الإلغاء',
        ]);
        $time = $this->GetCurrentTime();
        $this->broadCastOrderStatus($request->order_id,$time);
        $OrderUser = $this->getOrderUser($request->order_id);
        $this->PushNotification(
            $OrderUser->device_token,
            Notification::OrderCancelled,
            $OrderUser->id,
            auth("sanctum")->user()->id
        );
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
        $this->PushNotification(
            $OrderUser->device_token,
            Notification::OrderDelivered,
            $OrderUser->id,
            auth("sanctum")->user()->id
        );
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
        $this->PushNotification(
            $OrderUser->device_token,
            Notification::OrderPickedUp,
            $OrderUser->id,
            auth("sanctum")->user()->id
        );
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
