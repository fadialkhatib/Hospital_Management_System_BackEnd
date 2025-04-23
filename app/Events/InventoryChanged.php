<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InventoryChanged
{
    // use Dispatchable, InteractsWithSockets, SerializesModels;



    // public $item;  // أو $material
    // public $action;
    // public $changes;
    // public function __construct($item, $action, $changes`)
    // {
    //     $this->item = $item;
    //     $this->action = $action;
    //     $this->changes = $changes;
    // }
    // public function broadcastOn(): array
    // {
    //     return [
    //         new PrivateChannel('channel-name'),
    //     ];
    // }
}
