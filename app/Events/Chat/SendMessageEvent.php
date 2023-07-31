<?php

namespace App\Events\Chat;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * SendMessageEvent constructor.
     *
     * @param Message $message
     */
    public function __construct(private Message $message)
    {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PrivateChannel|array
     */
    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('chat.' . $this->message->from_user.$this->message->to_user);
    }

    /**
     * Broadcast's event name
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'message.sent';
    }

    /**
     * Data sending back to client
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'chat_id' => $this->message->chat_id,
            'message' => $this->message->toArray(),
        ];
    }
}
