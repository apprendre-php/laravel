<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Events\UpdateItemQuantity;




class CartController extends Controller
{
    public function show(Order $order)
    {
        $order = Auth::user()->orders()->where('status', 'active')->first();

        return view('cart.show', ['order' => $order]);
    }

    public function delete(Order $order, Request $request)
    {

        $order->update(['status' => 'cancelled']);

        $request->session()->flash('alert', ['type' => 'info', 'message' => "La commande $order->number a été annulé."]);

        UpdateItemQuantity::dispatch($order);

        return redirect()->route('items.index');
    }
}
