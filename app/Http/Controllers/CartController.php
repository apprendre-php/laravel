<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $order = Order::where('user_id',$user->id)->where('status','active')->first();

        return view('cart.show', ['order' => $order]);
    }
}
