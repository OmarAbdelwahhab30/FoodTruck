<?php

namespace App\Services\Orders;

use App\Events\Order\OrderHasAdded;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;

class AddOrderService extends Service
{


        public function ExecTransaction($request)
        {
            return DB::transaction(function () use ($request) {

                $order = $this->addOrder($request);
                $this->attachProduct($request->products, $order);
                broadcast(new OrderHasAdded($order,$order->user))->toOthers();
                $this->DestroyCart(auth("sanctum")->user());
                return Order::where("id", $order->id)->with("products")->get();
            });
        }


    public function addOrder($request)
    {
        return Order::create([
            'truck_id'      => $request->truck_id ,
            'arrival_time'  => $request->arrival_time,
            'delivery_type_'.app()->getLocale() => $request->delivery_type,
            'total_price'   => $request->total_price,
            'user_id'       => auth("sanctum")->user()->id,
        ]);
    }

    public function attachProduct($products,$order)
    {
        foreach ($products as $product)
        $order->products()->attach($product['id'], ['optional_'.app()->getLocale() => $product['optional']]);
    }

    private function DestroyCart($user)
    {
        $cart = Cart::find($user->cart->id);
        $cart->delete();
    }

}
