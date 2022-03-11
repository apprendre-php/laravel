<?php

namespace App\Listeners;

use App\Models\Item;
use App\Events\cancelOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class cancelOrderListener
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
    public function handle(cancelOrder $event)
    {
        $id = $event->order->id;
        $order_items = DB::table('item_order')->where('order_id',$id)->get();
        foreach($order_items as $order_item){
            $quantity = $order_item->quantity;
            $item_id = $order_item->item_id;
            $item = Item::where('id',$item_id)->first();
            $item->increment('quantity',$quantity); 
        } 
    }
}
