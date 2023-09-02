<?php

namespace App\Services\Orders;

use App\Abstracts\Notification;
use App\Events\Order\OrderHasAdded;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Truck;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\SellerOrderNotification;
use App\Services\Service;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;

class AddOrderService extends Service
{


    public function ExecTransaction($request)
    {
        $seller = Truck::find($request->truck_id)->user;
        return DB::transaction(function () use ($request, $seller) {

            $order = $this->addOrder($request);
            $this->attachProduct($request->products, $order);
            broadcast(new OrderHasAdded($order, $order->user))->toOthers();
            $this->DestroyCart(auth("sanctum")->user());
            $this->addPriceToSellerWallet($request->total_price, $seller->id);
            $this->PushNotification(
                $seller->device_token,
                Notification::OrderAdded,
                $seller->id,
                auth("sanctum")->user()->id,
                auth("sanctum")->user()->name
            );
            return Order::where("id", $order->id)->with("products")->get();
        });
    }


    public function addOrder($request)
    {
        return Order::create([
            'truck_id' => $request->truck_id,
            'arrival_time' => $request->arrival_time,
            'delivery_type_en' => $request->delivery_type_en,
            'delivery_type_ar' => $request->delivery_type_ar,
            'total_price' => $request->total_price,
            'user_id' => auth("sanctum")->user()->id,
        ]);
    }

    public function attachProduct($products, $order)
    {
        foreach ($products as $product)
            $order->products()->attach($product['id'], [
                'size_id' => $product['size_id'],
                'optional' => $product['optional'],
                'count' => $product['count'],
            ]);
    }

    private function DestroyCart($user)
    {
        if (isset($user->cart)) {
            $cart = Cart::find($user->cart->id);
            $cart->products()->detach();
            $cart->truck_id = null;
            $cart->save();
        }
    }

    private function addPriceToSellerWallet($price, $seller_id)
    {
        Wallet::where('user_id', $seller_id)->increment('balance', $price);
    }

}
