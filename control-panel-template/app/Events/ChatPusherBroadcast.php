<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatPusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $authorName;
    public string $receiver_id;
    public string $message;

    /**
     * Create a new event instance.
     */
    public function __construct($authorName, $receiver_id, $message)
    {
        $this->authorName = $authorName;
        $this->receiver_id = $receiver_id;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return ['chat-channel'];
    }

    public function broadcastAs(): string
    {
        return 'message';
    }
}
