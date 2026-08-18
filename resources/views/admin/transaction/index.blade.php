@extends('layouts.admin')

@section('title', 'Kelola Transaksi')

@section('content')
<div class="mt-4 space-y-4">
    <!-- Main Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <!-- Table Header -->
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-semibold tracking-wider border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4">Customer</th>
                        <th scope="col" class="px-6 py-4">Tanggal Sewa</th>
                        <th scope="col" class="px-6 py-4">Total</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($transactions as $transaction)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <!-- Customer Name -->
                            <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                {{ $transaction->user->name }}
                            </td>

                            <!-- Rent Date -->
                            <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                {{ $transaction->rent_date->format('d M Y') }}
                            </td>

                            <!-- Total Price -->
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap">
                                Rp{{ number_format($transaction->price_total, 0, ',', '.') }}
                            </td>

                            <!-- Dynamic Status Badges -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($transaction->status === 'On Rent')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200/60">
                                        {{ $transaction->status }}
                                    </span>
                                @elseif ($transaction->status === 'Returned')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200/60">
                                        {{ $transaction->status }}
                                    </span>
                                @elseif ($transaction->status === 'Done' || $transaction->status === 'Completed')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-200/60">
                                        {{ $transaction->status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">
                                        {{ $transaction->status }}
                                    </span>
                                @endif
                            </td>

                            <!-- Action Buttons -->
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.transactions.show', $transaction->id) }}" 
                                       class="text-blue-600 hover:text-blue-800 font-medium text-xs hover:underline transition-colors">
                                        Detail
                                    </a>

                                    @if ($transaction->status === 'On Rent')
                                        <form action="{{ route('admin.transactions.returned', $transaction->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="text-green-600 hover:text-green-800 font-medium text-xs hover:underline transition-colors">
                                                Tandai Kembali
                                            </button>
                                        </form>
                                    @endif

                                    @if ($transaction->status === 'Returned')
                                        <form action="{{ route('admin.transactions.done', $transaction->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="text-green-600 hover:text-green-800 font-medium text-xs hover:underline transition-colors">
                                                Selesaikan
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <p class="text-sm font-medium">Belum ada transaksi.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection