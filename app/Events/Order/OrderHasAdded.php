<?php

namespace App\Events\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderHasAdded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(private Order $order, private User $user)
    {
    }


    public function broadcastOn(): Channel
    {
        return new Channel('order');
    }


    public function broadcastAs(): string
    {
        return 'order.sent';
    }


    public function broadcastWith(): array
    {

        return [
            'order' => [
                'delivery_price'    => $this->order->delivery_price,
                'total_price'    => $this->order->total_price,
                'created_at' => $this->order->created_at,
                "delivery_type" => [$this->order->delivery_type_en, $this->order->delivery_type_ar],
                "status" => [
                    $this->order->status_en
                    , $this->order->status_ar
                ],
                "id" => "#00000" . $this->order->id,
                "updated_at" => $this->order->updated_at,
            ],
            'customer' => [
                $this->user->name,
                $this->user->id,
            ],
        ];
    }
}
