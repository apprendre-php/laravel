<?php

namespace App\Http\Controllers;

use App\Events\CancelledOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Psy\debug;

class CartController extends Controller
{
    public function show()
    {
        return view('cart.showCart');
    }
    
    public function cancelled(Order $order, Request $request){
        
        $order->update(['status' => 'cancelled']);

        $request->session()->flash('alert', ['type' => 'info', 'message' => "La commande $order->number a été annulée."]);

        CancelledOrder::dispatch($order);

        return back();
    }
    
}
