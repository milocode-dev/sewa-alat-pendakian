<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori dari CRUD Admin
        $categories = Category::all();

        // Ambil item sekaligus hitung total penyewaan (rentals_count) & rata-rata rating (reviews_avg_rating)
        $query = Item::with('category')
            ->withCount('rentals'); // Menghasilkan kolom $item->rentals_count
            // ->withAvg('reviews', 'rating'); // Menghasilkan kolom $item->reviews_avg_rating

        // 2. Inisialisasi query Item (tidak perlu filter stock > 0 agar item 'Habis' tetap tampil di UI)
        $query = Item::with('category');

        // 3. Filter berdasarkan Kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 4. Fitur Sortir (Harga & Terbaru)
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_low':
                    $query->orderBy('price_per_day', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price_per_day', 'desc');
                    break;
                case 'latest':
                    $query->latest();
                    break;
            }
        } else {
            $query->latest(); // Default: Tampilkan barang terbaru
        }

        // 5. Eksekusi query
        $items = $query->get();

        return view('katalog.index', compact('items', 'categories'));
    }
}
