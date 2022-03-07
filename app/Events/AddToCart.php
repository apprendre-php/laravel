<?php

namespace App\Events;

use App\Models\Item;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddToCart
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public Item $item;
    public int $quantity;

    public function __construct(User $user, Item $item, int $quantity)
    {
        $this->user = $user;
        $this->item = $item;
        $this->quantity = $quantity;
    }
}
