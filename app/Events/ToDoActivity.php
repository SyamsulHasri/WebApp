<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ToDoActivity
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, $action)
    {   
        $this->user_id = $data->user_id;
        $this->action = $action;
        $this->activity_id = $data->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
