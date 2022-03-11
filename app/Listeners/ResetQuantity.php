<?php

namespace App\Listeners;

use App\Models\Item;
use App\Events\GetResetQuantity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetQuantity
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
     * @param  object  $event
     * @return void
     */
    public function handle(GetResetQuantity $event)
    {
        foreach ($event->order->items as $item_quantity) {
            $item = Item::find($item_quantity->id);
            $item->quantity += $item_quantity->pivot->quantity;
            $item->save();
        }
    }
}
