<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.index', ['items' => $items]);
    }

    public function show(int $id)
    {
        $item = Item::findOrFail($id);

        return view('items.show', ['item' => $item]);
    }
}
