<?php

namespace App\Http\Controllers;

use App\Events\NewCreateItem;
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
            'quantity' => 'required|integer|gte:0',
            'description' => 'required',
        ]);

        $item = Item::create($inputs);

        NewCreateItem::dispatch($item);

        $request->session()->flash('alert', ['type' => 'success', 'message' => "L'article $item->name a été créé."]);

        return redirect()->route('items.index');
    }

    public function destroy(int $id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()->route('items.index');
    }

    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    public function update(Item $item, Request $request)
    {
        $inputs = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|url',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|gte:0',
            'description' => 'required',
        ]);

        $item->update($inputs);

        $request->session()->flash('alert', ['type' => 'success', 'message' => "L'article $item->name a été modifié."]);

        return redirect()->route('items.index');
    }
}
