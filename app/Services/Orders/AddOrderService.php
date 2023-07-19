<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Services\Service;

class AddOrderService extends Service
{

    public function addOrder($request)
    {
        Order::create([
           ''
        ]);
    }

}
