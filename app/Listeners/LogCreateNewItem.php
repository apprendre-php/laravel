<?php

namespace App\Listeners;

use App\Events\NewCreateItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogCreateNewItem
{
    public function handle(NewCreateItem $event)
    {
        Log::info(
            sprintf(
                'Un nouvel item a été crée : %s avec une quantitée de %s pièces',
                    $event->item->name,
                    $event->item->quantity
            )
        );
    }
}
