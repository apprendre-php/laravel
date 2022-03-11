<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RefillStock
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCancelled  $event
     * @return void
     */
    public function handle(OrderCancelled $event)
    {
        $order = $event->order;
        foreach ($order->items as $item) {
            $item->increment('quantity', $item->pivot->quantity);
        }
    }
}
