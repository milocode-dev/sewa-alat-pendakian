@extends('layouts.app')

@section('content')
    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- HERO SECTION -->
    <section class="bg-success bg-gradient text-white py-5 rounded-bottom-4 mb-5">
        <div class="container text-center">
            <span class="badge bg-warning text-dark fw-bold px-3 py-2 mb-3">
                <i class="bi bi-bag-check-fill me-1"></i> Form Sewa Alat
            </span>
            <h1 class="fw-bold display-6 mb-2">Booking Peralatan Pendakianmu</h1>
            <p class="fs-6 opacity-75 col-md-7 mx-auto mb-0">
                Pilih alat, tentukan tanggal sewa, lengkapi data diri — alat siap kamu ambil sebelum hari pendakian.
            </p>
        </div>
    </section>

    <div class="container mb-5">
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="row g-4">

                <!-- KOLOM KIRI: FORM SELEKSI -->
                <div class="col-lg-8">

                    <!-- 1. PILIH ALAT -->
                    <div class="card shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1"><i class="bi bi-basket3 text-success me-2"></i>Pilih Alat</h5>
                            <p class="text-muted small mb-4">Atur jumlah unit sesuai kebutuhan pendakianmu.</p>

                            <div class="list-group list-group-flush">
                                @foreach ($items as $alat)
                                    <div class="list-group-item d-flex align-items-center justify-content-between gap-3 px-0 py-3" 
                                         data-item-card 
                                         data-nama="{{ $alat->item_name }}" 
                                         data-harga="{{ $alat->price_per_day }}">
                                        
                                        <div class="d-flex align-items-center gap-3 overflow-hidden">
                                            <img src="{{ asset('storage/' . $alat->image) }}" class="rounded-3 flex-shrink-0 object-fit-cover" width="56" height="56" alt="{{ $alat->item_name }}">
                                            <div class="text-truncate">
                                                <h6 class="fw-bold mb-1 text-truncate">{{ $alat->item_name }}</h6>
                                                <small class="text-muted d-block text-truncate">
                                                    {{ $alat->category->category_name }} &bull; Stok {{ $alat->stock }} &bull; Rp{{ number_format($alat->price_per_day, 0, ',', '.') }}/hari
                                                </small>
                                            </div>
                                        </div>

                                        <div class="input-group input-group-sm flex-shrink-0" style="max-width: 120px;">
                                            <button type="button" class="btn btn-outline-success" data-qty-minus>
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="number" class="form-control text-center px-1" data-qty-input
                                                name="items[{{ $alat->id }}][qty]" value="0" min="0"
                                                max="{{ $alat->stock }}" {{ $alat->stock == 0 ? 'disabled' : '' }}>
                                            <button type="button" class="btn btn-outline-success" data-qty-plus>
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>

                                        <input type="hidden" name="items[{{ $alat->id }}][nama]" value="{{ $alat->item_name }}">
                                        <input type="hidden" name="items[{{ $alat->id }}][harga]" value="{{ $alat->price_per_day }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- 2. TANGGAL SEWA -->
                    <div class="card shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1"><i class="bi bi-calendar-week text-success me-2"></i>Tanggal Sewa</h5>
                            <p class="text-muted small mb-4">Tanggal ambil otomatis hari ini, tentukan tanggal kembali alat.</p>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Tanggal Ambil</label>
                                    <input type="date" name="tanggal_ambil" id="tanggalAmbil" class="form-control"
                                        value="{{ old('tanggal_ambil', now()->format('Y-m-d')) }}"
                                        min="{{ now()->format('Y-m-d') }}" readonly required>
                                    <div class="form-text">Otomatis diisi tanggal hari ini.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Tanggal Kembali</label>
                                    <input type="date" name="tanggal_kembali" id="tanggalKembali" class="form-control"
                                        value="{{ old('tanggal_kembali') }}"
                                        min="{{ now()->format('Y-m-d') }}" required>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-success d-flex align-items-center gap-2 mb-0">
                                        <i class="bi bi-info-circle"></i>
                                        <span>Durasi sewa: <strong id="durasiHari">0</strong> hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. METODE PEMBAYARAN -->
                    <div class="card shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1"><i class="bi bi-wallet2 text-success me-2"></i>Metode Pembayaran</h5>
                            <p class="text-muted small mb-3">Pilih metode pembayaran yang paling efisien untukmu.</p>
                            <select name="metode_bayar" class="form-select">
                                <option value="Cash">Cash (Bayar di Tempat)</option>
                                <option value="Transfer">Transfer Bank</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- KOLOM KANAN: RINGKASAN -->
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-4 sticky-top z-1" style="top: 1rem;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><i class="bi bi-receipt text-success me-2"></i>Ringkasan Pesanan</h5>

                            <ul class="list-group list-group-flush mb-3" id="summaryItems">
                                <li class="list-group-item px-0 text-muted small" data-empty-hint>
                                    Belum ada alat dipilih. Yuk pilih alat di sebelah kiri.
                                </li>
                            </ul>

                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item px-0 d-flex justify-content-between small">
                                    <span class="text-muted">Tanggal Ambil</span>
                                    <span class="fw-semibold" id="summaryTanggalAmbil">
                                        {{ now()->translatedFormat('d M Y') }}
                                    </span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between small">
                                    <span class="text-muted">Durasi Sewa</span>
                                    <span class="fw-semibold"><span id="summaryDurasi">0</span> hari</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between small">
                                    <span class="text-muted">Subtotal / hari</span>
                                    <span class="fw-semibold">Rp<span id="summarySubtotal">0</span></span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between small">
                                    <span class="text-muted">Deposit Jaminan</span>
                                    <span class="fw-semibold">Rp<span id="summaryDeposit">50.000</span></span>
                                </li>
                            </ul>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-bold">Total Bayar</span>
                                <span class="fw-bold text-success fs-5">Rp<span id="summaryTotal">50.000</span></span>
                            </div>

                            <button type="submit" class="btn btn-success w-100 fw-bold py-2">
                                <i class="bi bi-check2-circle me-1"></i> Konfirmasi & Booking Sekarang
                            </button>
                            <p class="text-muted small text-center mt-3 mb-0">
                                <i class="bi bi-shield-lock me-1"></i>Data kamu aman & hanya untuk verifikasi sewa.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        const formatRupiah = (num) => new Intl.NumberFormat('id-ID').format(num);
        const DEPOSIT = 50000;

        const itemCards = document.querySelectorAll('[data-item-card]');
        const summaryItemsEl = document.getElementById('summaryItems');
        const summarySubtotalEl = document.getElementById('summarySubtotal');
        const summaryDepositEl = document.getElementById('summaryDeposit');
        const summaryTotalEl = document.getElementById('summaryTotal');
        const summaryDurasiEl = document.getElementById('summaryDurasi');
        const durasiHariEl = document.getElementById('durasiHari');
        const tanggalAmbil = document.getElementById('tanggalAmbil');
        const tanggalKembali = document.getElementById('tanggalKembali');

        summaryDepositEl.textContent = formatRupiah(DEPOSIT);

        function syncMinKembali() {
            tanggalKembali.min = tanggalAmbil.value;
            if (tanggalKembali.value && tanggalKembali.value < tanggalAmbil.value) {
                tanggalKembali.value = tanggalAmbil.value;
            }
        }
        syncMinKembali();

        function getDurasiHari() {
            if (!tanggalAmbil.value || !tanggalKembali.value) return 0;
            const start = new Date(tanggalAmbil.value);
            const end = new Date(tanggalKembali.value);
            const diff = Math.round((end - start) / (1000 * 60 * 60 * 24));
            return diff > 0 ? diff : 0;
        }

        function updateSummary() {
            let subtotalPerHari = 0;
            let itemsHtml = '';
            let hasItems = false;

            itemCards.forEach(card => {
                const qtyInput = card.querySelector('[data-qty-input]');
                const qty = parseInt(qtyInput.value || '0', 10);
                if (qty > 0) {
                    hasItems = true;
                    const nama = card.dataset.nama;
                    const harga = parseInt(card.dataset.harga, 10);
                    subtotalPerHari += harga * qty;
                    itemsHtml += `
                        <li class="list-group-item px-0 d-flex justify-content-between small">
                            <span>${nama} <span class="text-muted">x${qty}</span></span>
                            <span class="fw-semibold">Rp${formatRupiah(harga * qty)}</span>
                        </li>`;
                }
            });

            summaryItemsEl.innerHTML = hasItems ?
                itemsHtml :
                '<li class="list-group-item px-0 text-muted small" data-empty-hint>Belum ada alat dipilih. Yuk pilih alat di sebelah kiri.</li>';

            const durasi = getDurasiHari();
            durasiHariEl.textContent = durasi;
            summaryDurasiEl.textContent = durasi;

            const total = (subtotalPerHari * (durasi || 1)) + DEPOSIT;

            summarySubtotalEl.textContent = formatRupiah(subtotalPerHari);
            summaryTotalEl.textContent = formatRupiah(total);
        }

        itemCards.forEach(card => {
            const qtyInput = card.querySelector('[data-qty-input]');
            const plusBtn = card.querySelector('[data-qty-plus]');
            const minusBtn = card.querySelector('[data-qty-minus]');
            const maxStok = parseInt(qtyInput.getAttribute('max'), 10);

            plusBtn.addEventListener('click', () => {
                const current = parseInt(qtyInput.value || '0', 10);
                qtyInput.value = current < maxStok ? current + 1 : maxStok;
                updateSummary();
            });

            minusBtn.addEventListener('click', () => {
                const current = parseInt(qtyInput.value || '0', 10);
                qtyInput.value = current > 0 ? current - 1 : 0;
                updateSummary();
            });

            qtyInput.addEventListener('input', updateSummary);
        });

        tanggalKembali.addEventListener('change', updateSummary);

        updateSummary();
    </script>
@endsection