@extends('layouts.admin')

@section('title', 'Kelola Transaksi')

@section('content')
<div class="mt-4">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Tanggal Sewa</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($transactions as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $transaction->user->name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $transaction->rent_date->format('d M Y') }}</td>
                        <td class="px-4 py-3 text-gray-600">Rp{{ number_format($transaction->price_total, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-1 rounded-full bg-gray-100">{{ $transaction->status }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="text-blue-600 hover:underline text-sm">Detail</a>

                                @if ($transaction->status === 'On Rent')
                                    <form action="{{ route('admin.transactions.returned', $transaction->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:underline text-sm">Tandai Kembali</button>
                                    </form>
                                @endif

                                @if ($transaction->status === 'Returned')
                                    <form action="{{ route('admin.transactions.done', $transaction->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:underline text-sm">Selesaikan</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-400">Belum ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection