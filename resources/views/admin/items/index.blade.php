@extends('layouts.admin')

@section('title', 'Kelola Alat')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200">

    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <div>
            <h3 class="font-semibold text-gray-800">Daftar Alat</h3>
            <p class="text-sm text-gray-500">Kelola data alat pendakian yang tersedia untuk disewa</p>
        </div>
        <a href="{{ route('admin.items.create') }}"
           class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-gray-800 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Alat
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-left text-gray-500 uppercase text-xs">
                    <th class="px-6 py-3 font-medium">Image</th>
                    <th class="px-6 py-3 font-medium">Nama</th>
                    <th class="px-6 py-3 font-medium">Kategori</th>
                    <th class="px-6 py-3 font-medium">Harga</th>
                    <th class="px-6 py-3 font-medium">Stock</th>
                    <th class="px-6 py-3 font-medium text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($items as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <img src="{{ $item->image ? asset('storage/public/'.$item->image) : asset('images/no-image.png') }}"
                                 alt="{{ $item->item_name }}"
                                 class="w-12 h-12 rounded-md object-cover border border-gray-200">
                        </td>
                        <td class="px-6 py-3 font-medium text-gray-800">
                            {{ $item->item_name }}
                        </td>
                        <td class="px-6 py-3">
                            <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">
                                {{ $item->category->category_name ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-gray-700">
                            Rp{{ number_format($item->price_per_day, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-3">
                            @if ($item->stock > 0)
                                <span class="text-gray-700">{{ $item->stock }}</span>
                            @else
                                <span class="text-red-600 font-medium">Habis</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.items.show', $item->id) }}"
                                   class="p-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-800"
                                   title="Lihat Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.items.edit', $item->id) }}"
                                   class="p-2 rounded-md text-blue-600 hover:bg-blue-50"
                                   title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-2 rounded-md text-red-600 hover:bg-red-50"
                                            title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                            Belum ada data alat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100">
        {{ $items->links() }}
    </div>
</div>
@endsection