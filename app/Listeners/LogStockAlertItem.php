<?php

namespace App\Listeners;

use App\Events\AddToCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogStockAlertItem
{
    public function handle(AddToCart $event)
    {
        if ($event->item->quantity < 50) {
            Log::info(
                sprintf(
                    "ATTENTION, il ne reste plus que %s pièces sur l'article %s",
                    $event->item->quantity,
                    $event->item->name,
                )
            );
        }
    }
}
