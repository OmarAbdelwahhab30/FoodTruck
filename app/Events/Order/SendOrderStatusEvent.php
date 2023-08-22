<?php

namespace App\Events\Order;

use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendOrderStatusEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $order;

    public function __construct($order_id,$time)
    {
        $this->order = Order::find($order_id);
        $this->time = $time;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['status.'.$this->order->id];
    }

    public function broadcastAs() {
        return 'new-status';
    }

        public function broadcastWith(): array
    {

        return[
            'order' => [
                $this->order->id,
                $this->order->status_en,
                $this->order->status_ar,
            ],
            'time' => [
                $this->time,
            ]
        ];
    }
}
