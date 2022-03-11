<?php

namespace App\Listeners;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReincrementationItem {


	/**
	 * Handle the event.
	 *
	 * @param  object $event
	 * @return void
	 */
	public function handle( $event ) {
		foreach ( $event->order->items as $item ) {
			$result = $item->quantity + $item->pivot->quantity;
			$item->increment( 'quantity', $result );
		}
	}
}
