<?php

namespace App\Listeners;

use App\Events\UpdateItemQuantity;
use App\Models\Item;
use App\Models\Order;


class ItemQuantity
{
    public function handle(UpdateItemQuantity $event)
    {
        $order = $event->order;

        foreach($order->items as $item)
        {
            $item->update([
                'quantity' => ($item->quantity + $item->pivot->quantity),
            ]);
        }
        
    }
}
