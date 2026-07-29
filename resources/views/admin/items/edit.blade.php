@extends('layouts.admin')

@section('title', 'Edit Alat')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 max-w-2xl">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="font-semibold text-gray-800">Edit Alat</h3>
        <p class="text-sm text-gray-500">Perbarui data alat "{{ $item->item_name }}"</p>
    </div>

    <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Alat</label>
            <input type="text" name="item_name" value="{{ old('item_name', $item->item_name) }}"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800">
            @error('item_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                <input type="number" name="stock" min="0" value="{{ old('stock', $item->stock) }}"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800">
                @error('stock') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Harga Sewa (per hari)</label>
            <div class="relative">
                <span class="absolute left-3 top-2.5 text-sm text-gray-500">Rp</span>
                <input type="number" name="price_per_day" min="0" value="{{ old('price_per_day', $item->price_per_day) }}"
                       class="w-full border border-gray-300 rounded-md pl-10 pr-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800">
            </div>
            @error('price_per_day') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="4"
                      class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800">{{ old('description', $item->description) }}</textarea>
            @error('description') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Alat</label>

            @if ($item->image)
                <img src="{{ asset('storage/'.$item->image) }}"
                     class="w-20 h-20 rounded-md object-cover border border-gray-200 mb-2">
            @endif

            <input type="file" name="image" accept="image/*"
                   class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
            <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
            @error('image') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-md hover:bg-gray-800">
                Update
            </button>
            <a href="{{ route('admin.items.index') }}"
               class="text-sm font-medium px-5 py-2 rounded-md border border-gray-300 hover:bg-gray-50">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection