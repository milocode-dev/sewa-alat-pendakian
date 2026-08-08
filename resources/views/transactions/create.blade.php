@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Booking Alat Pendakian</h2>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label small fw-medium">Tanggal Ambil</label>
                <input type="date" name="tanggal_ambil" value="{{ old('tanggal_ambil') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-medium">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" class="form-control" required>
            </div>
        </div>

        <h6 class="fw-bold mb-3">Pilih Alat</h6>

        <div class="table-responsive mb-4">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Alat</th>
                        <th>Kategori</th>
                        <th>Harga/Hari</th>
                        <th>Stok</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->category->category_name ?? '-' }}</td>
                            <td>Rp{{ number_format($item->price_per_day, 0, ',', '.') }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <input type="number" name="items[{{ $item->id }}][qty]"
                                       value="0" min="0" max="{{ $item->stock }}"
                                       class="form-control form-control-sm" style="width:80px">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-4">
            <label class="form-label small fw-medium">Metode Pembayaran</label>
            <select name="metode_bayar" class="form-select">
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer Bank</option>
                <option value="QRIS">QRIS</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">Booking Sekarang</button>
    </form>
</div>
@endsection
