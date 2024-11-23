<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductInteracted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $productId;
    public $action; // e.g., 'view', 'rate', 'purchase'
    /**
     * Create a new event instance.
     */
    public function __construct($userId, $productId, $action)
    {
        $this->userId = $userId;
        $this->productId = $productId;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
