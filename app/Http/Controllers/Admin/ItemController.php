<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->latest()->paginate(10);

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();

        return view('admin.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'item_name'     => 'required|max:255',
            'description'   => 'nullable',
            'price_per_day' => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'image'         => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        Item::create($validated);

        return redirect()->route('admin.items.index')->with('success', 'Alat berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $item = Item::with('category')->findOrFail($id);

        return view('admin.items.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = \App\Models\Category::all();

        return view('admin.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'item_name'     => 'required|max:255',
            'description'   => 'nullable',
            'price_per_day' => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'image'         => 'nullable|image|max:2048', // nullable saat update
        ]);

        $item = Item::findOrFail($id);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($validated);

        return redirect()->route('admin.items.index')->with('success', 'Alat berhasil diubah!');
    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.items.index')->with('success', 'Alat berhasil dihapus!');
    }

    
}