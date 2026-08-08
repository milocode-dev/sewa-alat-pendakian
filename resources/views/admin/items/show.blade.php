@extends('layouts.admin')

@section('title', 'Detail Alat')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 max-w-3xl">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h3 class="font-semibold text-gray-800">Detail Alat</h3>
            <p class="text-sm text-gray-500">Informasi lengkap "{{ $item->item_name }}"</p>
        </div>
        <a href="{{ route('admin.items.index') }}"
           class="text-sm font-medium px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-50">
            &larr; Kembali
        </a>
    </div>

    <div class="px-6 py-6 grid grid-cols-3 gap-6">
        {{-- Gambar --}}
        <div class="col-span-1">
            <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('images/no-image.png') }}"
                alt="{{ $item->item_name }}"
                 class="w-full aspect-square object-cover rounded-lg border border-gray-200">
        </div>

        {{-- Info --}}
        <div class="col-span-2 space-y-4">
            <div>
                <p class="text-xs text-gray-400 uppercase font-medium">Nama Alat</p>
                <p class="text-base font-semibold text-gray-800">{{ $item->item_name }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase font-medium">Kategori</p>
                    <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full mt-1">
                        {{ $item->category->category_name }}
                    </span>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-medium">Stock</p>
                    <p class="text-sm text-gray-700 mt-1">
                        @if ($item->stock > 0)
                            {{ $item->stock }} unit
                        @else
                            <span class="text-red-600 font-medium">Habis</span>
                        @endif
                    </p>
                </div>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase font-medium">Harga Sewa</p>
                <p class="text-sm text-gray-700 mt-1">
                    Rp{{ number_format($item->price_per_day, 0, ',', '.') }} / hari
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase font-medium">Deskripsi</p>
                <p class="text-sm text-gray-600 mt-1 leading-relaxed">
                    {{ $item->description ?? '-' }}
                </p>
            </div>
        </div>
    </div>

    <div class="px-6 py-4 border-t border-gray-100 flex items-center gap-3">
        <a href="{{ route('admin.items.edit', $item->id) }}"
           class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-md hover:bg-gray-800">
            Edit Alat
        </a>
        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-sm font-medium px-5 py-2 rounded-md border border-red-300 text-red-600 hover:bg-red-50">
                Hapus Alat
            </button>
        </form>
    </div>
</div>
@endsection