<?php

namespace App\Services\Orders;

use App\Models\Order;

class DeleteOrderService extends \App\Services\Service
{

    public function cancelOrderById($request): bool
    {
        $order = Order::find($request->order_id);
        if ($order->delete()){
            return true;
        }
        return false;
    }

}
