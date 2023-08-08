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
    use Dispatchable, InteractsWithSockets, SerializesModels;
//    public function __construct(private $order_id,private User $user)
//    {
//        $this->order = Order::find($this->order_id);
//    }
//
//
//    public function broadcastOn(): Channel
//    {
//        return new Channel('status');
//    }
//
//
//    public function broadcastAs()
//    {
//        return 'order.status';
//    }
//
//
//    public function broadcastWith(): array
//    {
//
//        return[
//            'order' => [
//                $this->order->status_en,
//                $this->order->status_ar,
//            ],
//            'customer'  =>[
//                $this->user->name,
//            ],
//        ];
//    }

    private $order;

    public function __construct($order_id)
    {
        $this->order = Order::find($order_id);
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
        ];
    }
}
