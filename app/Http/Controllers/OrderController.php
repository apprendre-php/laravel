<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Events\AddToCart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Listeners\ReincrementationItem;
use App\Events\EventReincrementationItem;


class OrderController extends Controller {

	public function show( Order $order ) {
		return view( 'orders.show', array( 'order' => $order ) );
	}

	public function addItem( Item $item, Request $request ) {
		$inputs = $request->validate(
			array(
				'quantity' => 'required|lte:' . $item->quantity,
			)
		);

		DB::beginTransaction();

		$order = $request->user()->orders()->firstOrCreate( array( 'status' => 'active' ), array( 'number' => Str::random() ) );

		$order->items()->attach( $item, $inputs );

		$item->decrement( 'quantity', $inputs['quantity'] );

		DB::commit();

		AddToCart::dispatch( $request->user(), $item, $inputs['quantity'] );

		$request->session()->flash(
			'alert',
			array(
				'type'    => 'info',
				'message' => sprintf( "L'article %s a été ajouté en %s exemplaires.", $item->name, $inputs['quantity'] ),
			)
		);

		return redirect()->route( 'items.index' );
	}

	public function checkout( Order $order, Request $request ) {
		$order->update( array( 'status' => 'paid' ) );

		$request->session()->flash(
			'alert',
			array(
				'type'    => 'info',
				'message' => "La commande $order->number a été réglé.",
			)
		);

		return back();
	}

	public function cancell( Order $order, Request $request ) {

		$order->update( array( 'status' => 'cancelled' ) );
		$request->session()->flash(
			'alert',
			array(
				'type'    => 'info',
				'message' => "La commande $order->number a été annulée.",
			)
		);

		EventReincrementationItem::dispatch( $order );

		return redirect()->route( 'items.index' );
	}
}
