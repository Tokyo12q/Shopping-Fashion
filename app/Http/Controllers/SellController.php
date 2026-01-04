<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    // Show all sells
    public function index()
    {
        $sells = Sell::with(['item', 'user'])->orderBy('created_at', 'desc')->get();
        return view('sells.index', compact('sells'));
    }

    // Show create sell form
    public function create()
    {
        $items = Item::where('stock_quantity', '>', 0)->get();
        $users = User::all();
        return view('sells.create', compact('items', 'users'));
    }

    // Store new sell
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'sell_date' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);

        // Check if enough stock
        if ($item->stock_quantity < $request->quantity) {
            return back()->withErrors(['error' => 'Not enough stock! Available: ' . $item->stock_quantity]);
        }

        // Calculate total price
        $totalPrice = $item->price * $request->quantity;

        // Create sell record
        Sell::create([
            'item_id' => $request->item_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'sell_date' => $request->sell_date,
        ]);

        // Update item stock
        $item->stock_quantity -= $request->quantity;
        $item->save();

        return redirect()->route('sells.index')->with('success', 'Sell recorded successfully!');
    }
}