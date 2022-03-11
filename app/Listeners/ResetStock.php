<?php

namespace App\Listeners;

use App\Models\Item;
use App\Events\CancelItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ResetStock
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
     * @param  \App\Events\CancelItem  $event
     * @return void
     */
    public function handle(CancelItem $event)
    {  
       foreach($event->order->items as $items){
      $qty = $items->quantity + $items->pivot->quantity;
      
        $items->update([
            'quantity'=>$qty
        ]);
       }

    }
}
