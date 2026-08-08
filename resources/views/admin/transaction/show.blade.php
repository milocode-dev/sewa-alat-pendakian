@extends('layouts.admin')

@section('title', 'Detail Transaksi')

@section('content')
<div class="mt-4 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <p class="text-gray-500 text-sm mb-1">Customer</p>
    <p class="font-semibold mb-4">{{ $transaction->user->name }}</p>

    <p class="text-gray-500 text-sm mb-1">Periode Sewa</p>
    <p class="font-semibold mb-4">{{ $transaction->rent_date->format('d M Y') }} — {{ $transaction->expected_return_date->format('d M Y') }}</p>

    <p class="text-gray-500 text-sm mb-2">Alat yang Disewa</p>
    <ul class="mb-4 text-sm">
        @foreach ($transaction->details as $detail)
            <li>{{ $detail->item->item_name ?? 'Alat dihapus' }} x{{ $detail->quantity }} — Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</li>
        @endforeach
    </ul>

    <p class="font-bold text-lg mb-4">Total: Rp{{ number_format($transaction->price_total, 0, ',', '.') }}</p>

    @if ($transaction->payment)
        <p class="text-gray-500 text-sm mb-1">Pembayaran</p>
        <p class="mb-4">{{ $transaction->payment->payment_method }} — {{ $transaction->payment->status }}</p>
    @endif

    @if ($transaction->retur)
        <p class="text-gray-500 text-sm mb-1">Pengembalian</p>
        <p class="mb-4">Telat {{ $transaction->retur->late_days }} hari, denda Rp{{ number_format($transaction->retur->denda, 0, ',', '.') }}</p>
    @endif

    <a href="{{ route('admin.transactions.index') }}" class="text-blue-600 text-sm hover:underline">&larr; Kembali</a>
</div>
@endsection