<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendOrderStatusEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $order;

    public function __construct($order_id,$time =null)
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
                'order_id' => $this->order->id,
                'order_status' => [
                    $this->order->status_en
                    ,$this->order->status_ar
                ],
                'order_updated_at' =>$this->order->updated_at,
            ],
            'time' => [
                'time' => $this->time,
            ]
        ];
    }
}
