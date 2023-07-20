<?php

namespace App\Services\Orders;

use App\Models\Order;

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
}
