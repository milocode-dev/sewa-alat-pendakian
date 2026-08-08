<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Transaction;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $totalCategories = Category::count();
        $totalStock = Item::sum('stock');
        $lowStockItems = Item::where('stock', '<', 5)->get();
        $pendingTestimonials = Testimonial::where('status', 'Pending')->count();
        $activeTransactions = Transaction::whereIn('status', ['Pending', 'On Rent'])->count();
        $totalRevenue = Payment::where('status', 'Paid')->sum('payment_total');

        return view('admin.dashboard', compact(
            'totalItems', 'totalCategories', 'totalStock',
            'lowStockItems', 'pendingTestimonials', 'activeTransactions', 'totalRevenue'
        ));
    }
}