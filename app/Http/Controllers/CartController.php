<?php

namespace App\Http\Controllers;


use App\Models\Item;


use App\Models\Order;
use App\Events\CancelItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }


    public function cancel(Order $order){

        $order->update(['status' => 'canceled']);

        CancelItem::dispatch($order);
    
        return redirect()->route('items.index');

    }


    
}




