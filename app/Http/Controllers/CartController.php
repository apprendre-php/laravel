<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

	public function show( Order $order ) {

		$order = Auth::user()->orders()->where( 'status', 'active' )->first();
		return view( 'cart.show', array( 'order' => $order ) );
	}
}
