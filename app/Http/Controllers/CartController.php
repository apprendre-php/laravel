<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Events\GetResetQuantity;

class CartController extends Controller
{

    public function show(Order $order)
    {
        return view('cart.show', ['order' => $order]);
    }

    public function cancelled(Order $order, Request $request)
    {
        $order->update(['status' => 'cancelled']);

        GetResetQuantity::dispatch($order);

        $request->session()->flash('alert', ['type' => 'info', 'message' => "La commande $order->number a été annulé."]);

        return redirect()->route('items.index');
    }

}
