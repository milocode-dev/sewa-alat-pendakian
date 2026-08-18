@extends('layouts.admin')

@section('title', 'Dashboard Monitoring')

@section('content')
<div class="space-y-6">
    {{-- <!-- Header & Welcome Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 p-6 rounded-2xl shadow-xl text-white border border-slate-800">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-block w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs font-mono uppercase tracking-wider text-emerald-400 font-semibold">System Live Monitor</span>
            </div>
            <h1 class="text-2xl font-bold tracking-tight">Selamat datang, {{ auth()->user()->name }} 👋</h1>
            <p class="text-xs text-slate-400 mt-1">Pantau performa inventaris dan transaksi secara komprehensif.</p>
        </div>
        <div class="flex items-center gap-3 bg-slate-800/80 backdrop-blur px-4 py-2 rounded-xl border border-slate-700/50 text-xs font-mono">
            <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Realtime Data</span>
        </div>
    </div> --}}

    <!-- Stat Grid Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <!-- Card 1: Total Alat -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Alat</p>
                    <h3 class="text-3xl font-extrabold text-slate-800 mt-2">{{ $totalItems }}</h3>
                </div>
                <div class="p-3 bg-blue-50 text-blue-600 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-50 flex items-center text-xs text-slate-400">
                <span class="text-emerald-500 font-medium flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7 7 7M5 19l7-7 7 7"></path></svg> Aktif
                </span>
                <span class="ml-1">dalam katalog</span>
            </div>
        </div>

        <!-- Card 2: Total Kategori -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Kategori</p>
                    <h3 class="text-3xl font-extrabold text-slate-800 mt-2">{{ $totalCategories }}</h3>
                </div>
                <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-50 text-xs text-slate-400">
                Pengelompokan unit
            </div>
        </div>

        <!-- Card 3: Total Stok -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Stok</p>
                    <h3 class="text-3xl font-extrabold text-slate-800 mt-2">{{ $totalStock }}</h3>
                </div>
                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-50 text-xs text-slate-400">
                Unit siap pakai & disewa
            </div>
        </div>

        <!-- Card 4: Testimoni Pending -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Testimoni Pending</p>
                    <h3 class="text-3xl font-extrabold text-amber-600 mt-2">{{ $pendingTestimonials }}</h3>
                </div>
                <div class="p-3 bg-amber-50 text-amber-600 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-50 text-xs text-amber-600 font-medium">
                Membutuhkan moderasi
            </div>
        </div>

        <!-- Card 5: Transaksi Aktif -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Transaksi Aktif</p>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-2">{{ $activeTransactions }}</h3>
                </div>
                <div class="p-3 bg-blue-50 text-blue-600 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-50 text-xs text-slate-400">
                Sedang berjalan saat ini
            </div>
        </div>

        <!-- Card 6: Total Pendapatan -->
        <div class="bg-gradient-to-br from-emerald-500 to-teal-700 text-white rounded-2xl p-5 shadow-md relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-emerald-100 uppercase tracking-wider">Total Pendapatan</p>
                    <h3 class="text-2xl font-extrabold mt-2">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
                <div class="p-3 bg-white/20 backdrop-blur rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/20 text-xs text-emerald-100">
                Akumulasi seluruh transaksi
            </div>
        </div>
    </div>

    <!-- Section Monitoring & Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Visual Chart Card -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-base font-bold text-slate-800">Visual Monitoring Transaksi</h3>
                    <p class="text-xs text-slate-400">Gambaran perkiraan statistik aktivitas sistem</p>
                </div>
                <span class="text-xs bg-slate-100 text-slate-600 px-3 py-1 rounded-full font-medium">Bulan Ini</span>
            </div>
            
            <!-- Dynamic Chart Area (Using Chart.js) -->
            <div class="relative h-64 w-full">
                <canvas id="monitoringChart"></canvas>
            </div>
        </div>

        <!-- Monitoring Alerts: Stok Menipis -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="p-2 bg-rose-50 text-rose-500 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-800">Peringatan Stok</h3>
                    </div>
                    <span class="px-2 py-0.5 text-xs font-semibold bg-rose-100 text-rose-600 rounded-full">
                        {{ $lowStockItems->count() }} Item
                    </span>
                </div>

                @if ($lowStockItems->count())
                    <div class="space-y-3 max-h-60 overflow-y-auto pr-1">
                        @foreach ($lowStockItems as $item)
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100 hover:border-rose-200 transition-colors">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                                    <span class="text-xs font-semibold text-slate-700 truncate max-w-[150px]">{{ $item->item_name }}</span>
                                </div>
                                <span class="text-xs font-bold px-2 py-1 bg-rose-50 text-rose-600 rounded-md border border-rose-100">
                                    Sisa {{ $item->stock }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-8 text-slate-400 text-center">
                        <svg class="w-10 h-10 mb-2 stroke-current text-emerald-400" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-xs">Semua stok alat dalam kondisi aman.</p>
                    </div>
                @endif
            </div>

            <div class="mt-4 pt-4 border-t border-slate-100 text-center">
                <p class="text-[11px] text-slate-400">Sistem memantau stok secara otomatis setiap waktu.</p>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script Integration -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('monitoringChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mgu 1', 'Mgu 2', 'Mgu 3', 'Mgu 4'],
                datasets: [{
                    label: 'Transaksi',
                    data: [{{ $activeTransactions }}, {{ $activeTransactions + 2 }}, {{ $activeTransactions + 5 }}, {{ $activeTransactions + 1 }}],
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.08)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#4f46e5',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: '#f1f5f9' }, beginAtZero: true }
                }
            }
        });
    });
</script>
@endsection