<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SpeedChange implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $classroom;
    public $speed;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($classroom, $speed)
    {
        $this->classroom = $classroom;
        $this->speed = $speed;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->classroom);
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'speed.changed';
    }

}
