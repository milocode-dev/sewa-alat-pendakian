<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $items = Item::with('category')->where('stock', '>', 0);

        if ($request->category_id) {
            $items->where('category_id', $request->category_id);
        }

        $items = $items->get();

        return view('katalog.index', compact('items', 'categories'));
    }
}