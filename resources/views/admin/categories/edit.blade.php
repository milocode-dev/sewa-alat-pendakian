@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 w-full">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="font-semibold text-gray-800">Edit Kategori</h3>
        <p class="text-sm text-gray-500">Perbarui data kategori "{{ $category->category_name }}"</p>
    </div>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="category_name" value="{{ old('item_name', $category->category_name) }}"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-800">
            @error('category_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-md hover:bg-gray-800">
                Update
            </button>
            <a href="{{ route('admin.categories.index') }}"
               class="text-sm font-medium px-5 py-2 rounded-md border border-gray-300 hover:bg-gray-50">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection