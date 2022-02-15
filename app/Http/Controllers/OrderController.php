<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    public function addItem(Item $item, Request $request)
    {
        $inputs = $request->validate([
            'quantity' => 'required|lte:'. $item->quantity,
        ]);

        DB::beginTransaction();

        $order = $request->user()->orders()->firstOrCreate(['status' => 'active'], ['number' => Str::random()]);

        $order->items()->attach($item, $inputs);

        $item->decrement('quantity', $inputs['quantity']);

        DB::commit();

        return redirect()->route('items.index');
    }
}
