@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 w-full">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="font-semibold text-gray-800">Tambah Alat Baru</h3>
        <p class="text-sm text-gray-500">Isi form di bawah untuk menambahkan alat pendakian</p>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="px-6 py-6 space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="category_name" value="{{ old('category_name') }}"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
                   placeholder="Contoh: Tenda">
            @error('category_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-md hover:bg-gray-800">
                Simpan
            </button>
            <a href="{{ route('admin.categories.index') }}"
               class="text-sm font-medium px-5 py-2 rounded-md border border-gray-300 hover:bg-gray-50">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection