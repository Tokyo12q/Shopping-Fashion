<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Sell;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalItems = Item::count();
        $totalSells = Sell::count();
        $lowStock = Item::where('stock_quantity', '<', 10)->count();

        return view('dashboard.index', compact('totalUsers', 'totalItems', 'totalSells', 'lowStock'));
    }
}
