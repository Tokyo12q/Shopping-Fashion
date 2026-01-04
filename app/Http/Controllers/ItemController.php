<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Show all items
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Show stock page
    public function stock()
    {
        $items = Item::orderBy('stock_quantity', 'asc')->get();
        return view('items.stock', compact('items'));
    }

    // Show create form
    public function create()
    {
        return view('items.create');
    }

    // Store new item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    // Update item
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    // Delete item
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}