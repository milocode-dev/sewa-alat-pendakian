@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mt-4">
    <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }} 👋</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Total Alat</p>
            <p class="text-2xl font-bold mt-1">{{ $totalItems }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Total Kategori</p>
            <p class="text-2xl font-bold mt-1">{{ $totalCategories }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Total Stok</p>
            <p class="text-2xl font-bold mt-1">{{ $totalStock }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Testimoni Pending</p>
            <p class="text-2xl font-bold mt-1">{{ $pendingTestimonials }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Transaksi Aktif</p>
            <p class="text-2xl font-bold mt-1">{{ $activeTransactions }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Total Pendapatan</p>
            <p class="text-2xl font-bold mt-1">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
    </div>

    @if ($lowStockItems->count())
    <div class="bg-white rounded-lg shadow-sm border-l-4 border-red-500 border-t border-r border-b border-gray-200 p-5 mt-6">
        <p class="font-semibold text-gray-800 mb-3">⚠️ Alat dengan Stok Menipis</p>
        <ul class="text-sm text-gray-600 space-y-1">
            @foreach ($lowStockItems as $item)
                <li>{{ $item->item_name }} — sisa {{ $item->stock }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection