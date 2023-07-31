<?php

namespace App\Events\Order;

use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendOrderStatusEvent implements ShouldBroadcast
{
    public function __construct(private $order_id,private User $user)
    {
        $this->order = Order::find($this->order_id);
    }


    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('truck.' . $this->order_id);
    }


    public function broadcastAs(): string
    {
        return 'order.status';
    }


    public function broadcastWith(): array
    {

        return[
            'order' => [
                $this->order->status_en,
                $this->order->status_ar,
            ],
            'customer'  =>[
                $this->user->name,
            ],
        ];
    }
}
