<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Retur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // Form booking
    public function create()
    {
        $items = Item::all();
        return view('transactions.create', compact('items'));
    }

    // Simpan booking
    public function store(Request $request)
{
    $request->validate([
        'tanggal_ambil' => 'required|date|after_or_equal:today',
        'tanggal_kembali' => 'required|date|after:tanggal_ambil',
        'metode_bayar' => 'required',
    ]);

    DB::beginTransaction();

    try {
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'rent_date' => $request->tanggal_ambil,
            'expected_return_date' => $request->tanggal_kembali,
            'price_total' => 0,
            'status' => 'Pending',
        ]);

        $total = 0;

        foreach ($request->items as $itemId => $item) {
            if ($item['qty'] <= 0) continue;

            $barang = Item::findOrFail($itemId);
            $subtotal = $barang->price_per_day * $item['qty'];

            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'item_id' => $barang->id,
                'quantity' => $item['qty'],
                'price_per_day' => $barang->price_per_day,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
            $barang->decrement('stock', $item['qty']);
        }

        $transaction->update(['price_total' => $total]);

        Payment::create([
            'transaction_id' => $transaction->id,
            'payment_date' => now(),
            'payment_total' => $total,
            'payment_method' => $request->metode_bayar,
            'status' => 'Paid',
        ]);

        $transaction->update(['status' => 'On Rent']);

        DB::commit();

        return redirect()->route('transaction.riwayat')
            ->with('success', 'Booking berhasil dibuat.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}

    // ADMIN — semua transaksi
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->get();
        return view('admin.transaction.index', compact('transactions'));
    }

    // ADMIN — detail transaksi
    public function show(Transaction $transaction)
    {
        $transaction->load('details.item', 'payment');
        return view('admin.transaction.show', compact('transaction'));
    }

    // CUSTOMER — riwayat sewa sendiri
    public function riwayat()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->with(['details.item', 'payment'])
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function markReturned(Transaction $transaction)
    {
        if ($transaction->status !== 'On Rent') {
            return back()->with('error', 'Transaksi ini belum bisa ditandai kembali.');
        }

        $lateDays = 0;
        if (now()->gt($transaction->expected_return_date)) {
            $lateDays = now()->diffInDays($transaction->expected_return_date);
        }
        $denda = $lateDays * 10000; // Rp10.000/hari keterlambatan — sesuaikan sendiri kalau mau beda

        Retur::create([
            'transaction_id' => $transaction->id,
            'return_date' => now(),
            'late_days' => $lateDays,
            'denda' => $denda,
            'note' => $lateDays > 0 ? "Terlambat {$lateDays} hari" : null,
        ]);

        foreach ($transaction->details as $detail) {
            if ($detail->item) {
                $detail->item->increment('stock', $detail->quantity);
            }
        }

        $transaction->update(['status' => 'Returned']);

        return back()->with('success', 'Alat berhasil ditandai kembali.');
    }

    public function markDone(Transaction $transaction)
    {
        if ($transaction->status !== 'Returned') {
            return back()->with('error', 'Transaksi ini belum bisa diselesaikan.');
        }

        $transaction->update(['status' => 'Done']);

        return back()->with('success', 'Transaksi berhasil diselesaikan.');
    }
}
