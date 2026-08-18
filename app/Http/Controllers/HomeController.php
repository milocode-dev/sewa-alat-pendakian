<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Item; // Gunakan Model Item

class HomeController extends Controller
{
    public function index() {
        
        $testimonials = Testimonial::where('status', '=', 'Approved')
            ->with('user')
            ->latest()
            ->take(6)
            ->get();

        // Mengambil 4 item terlaris berdasarkan transaksi
        $produkPopuler = Item::with('category')
            ->withCount('detailTransactions') // Menggunakan detailTransactions
            ->orderBy('detail_transactions_count', 'desc')
            ->take(4)
            ->get();

        return view('home.index', compact('testimonials', 'produkPopuler'));
    }
}