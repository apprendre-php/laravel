<?php

namespace App\Listeners;

use App\Events\CancelledOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CancelledOrderListener
{
    public function handle(CancelledOrder $event)
    {

        foreach($event->order->items as $item){
            $quantity = $item->quantity + $item->pivot->quantity;
            $item->quantity = $quantity;

            $item->save();
        }


    }
}
