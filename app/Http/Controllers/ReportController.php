<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use App\Models\Item;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Get filter type (default: all)
        $filter = $request->get('filter', 'all');
        
        $query = Sell::query();
        
        // Apply filters
        if ($filter == 'today') {
            $query->whereDate('sell_date', Carbon::today());
        } elseif ($filter == 'week') {
            $query->whereBetween('sell_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filter == 'month') {
            $query->whereMonth('sell_date', Carbon::now()->month)
                  ->whereYear('sell_date', Carbon::now()->year);
        }
        
        $sells = $query->with('item')->get();
        
        // Calculate statistics
        $totalItemsSold = $sells->sum('quantity');
        $totalRevenue = $sells->sum('total_price');
        $totalSales = $sells->count();
        
        // Get top selling items
        $topItems = Sell::selectRaw('item_id, SUM(quantity) as total_quantity, SUM(total_price) as total_revenue')
            ->groupBy('item_id')
            ->orderBy('total_quantity', 'desc')
            ->with('item')
            ->limit(5)
            ->get();
        
        // Low stock items
        $lowStockItems = Item::where('stock_quantity', '<', 10)->get();
        
        return view('reports.index', compact('sells', 'totalItemsSold', 'totalRevenue', 'totalSales', 'topItems', 'lowStockItems', 'filter'));
    }
}