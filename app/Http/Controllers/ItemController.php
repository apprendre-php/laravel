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

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|url',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'description' => 'required',
        ]);

        Item::create($inputs);

        return redirect()->route('items.index');
    }

    public function destroy(int $id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()->route('items.index');
    }
}
