<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function create()
    {
        $items = Item::all();

        return view('transaction.index', compact('items'));
    }

    public function index()
    {
        $transactions = Transaction::with('user')
            ->latest()
            ->get();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'tanggal_ambil' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_ambil',
            'metode_bayar' => 'required',
        ]);

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

                if ($item['qty'] <= 0) {
                    continue;
                }

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

                // langkah 8
                $barang->decrement('stock', $item['qty']);
            }

            // update total transaksi
            $transaction->update([
                'price_total' => $total,
            ]);

            // langkah 9
            Payment::create([
                'transaction_id' => $transaction->id,
                'payment_date' => now(),
                'payment_total' => $total,
                'method' => $request->metode_bayar,
                'status' => 'Pending',
            ]);

            DB::commit();

            return redirect()->route('transaction')
                ->with('success', 'Booking berhasil dibuat.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('details.item', 'payment');

        return view('admin.transaction.show', compact('transaction'));
    }
}
