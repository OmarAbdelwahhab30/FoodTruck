<?php

namespace App\Events\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderHasAdded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;



    public function __construct(private Order $order,private User $user)
    {
        $this->order = $order;
        $this->user  = $user;
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

        return[
            'order' => [
                $this->order->created_at,
                $this->order->delivery_type,
                "#00000".$this->order->id
            ],
            'customer'  =>[
                $this->user->name,
            ],
        ];
    }
}
