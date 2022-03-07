<?php

namespace App\Listeners;

use App\Events\AddToCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogNewAddItemToCart
{
    public function handle(AddToCart $event)
    {
        Log::info(sprintf(
            "L'utilisateur %s a ajouté à son panier %s * %s",
            $event->user->email,
            $event->item->name,
            $event->quantity
        ));
    }
}
