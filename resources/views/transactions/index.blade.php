@extends('layouts.app_navbar_')

@section('content')
    <!-- CDN Bootstrap Icons & Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .hover-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
        }

        .card-custom {
            border: none;
            border-radius: 16px;
        }

        .status-badge {
            font-weight: 600;
            padding: 0.45em 0.85em;
            border-radius: 30px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-custom thead th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 1rem;
        }

        .table-custom tbody td {
            padding: 1.1rem 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: #cbd5e1;
        }
    </style>

    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">Riwayat Sewa Saya</h2>
                <p class="text-muted small mb-0">Pantau dan kelola semua transaksi penyewaan Anda</p>
            </div>
            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 fw-semibold">
                <i class="bi bi-clock-history me-1"></i> Total: {{ $transactions->count() }} Transaksi
            </span>
        </div>

        <!-- Alert Notification -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Content -->
        @if ($transactions->isEmpty())
            <!-- Empty State -->
            <div class="card card-custom shadow-sm text-center py-5">
                <div class="card-body">
                    <i class="bi bi-receipt-cutoff empty-state-icon mb-3 d-block"></i>
                    <h5 class="fw-bold text-dark mb-2">Belum Ada Riwayat Sewa</h5>
                    <p class="text-muted mb-4">Anda belum pernah melakukan transaksi penyewaan apapun.</p>
                </div>
            </div>
        @else
            <!-- Transaction Table Card -->
            <div class="card card-custom shadow-sm overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-custom align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">ID Transaksi</th>
                                <th>Tanggal Ambil</th>
                                <th>Tanggal Kembali</th>
                                <th>Total Harga</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="hover-lift">
                                    <td class="text-center fw-bold text-secondary">
                                        #{{ sprintf('%04d', $transaction->id) }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar-event text-primary me-2"></i>
                                            <span>{{ \Carbon\Carbon::parse($transaction->rent_date)->format('d M Y') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar-check text-success me-2"></i>
                                            <span>{{ \Carbon\Carbon::parse($transaction->expected_return_date)->format('d M Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-dark">
                                        Rp {{ number_format($transaction->price_total, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $statusLower = strtolower($transaction->status);
                                            $badgeClass = match ($statusLower) {
                                                'selesai', 'success', 'paid' => 'bg-success-subtle text-success border border-success-subtle',
                                                'pending', 'menunggu' => 'bg-warning-subtle text-warning border border-warning-subtle',
                                                'disewa', 'active' => 'bg-info-subtle text-info border border-info-subtle',
                                                'batal', 'cancelled', 'failed' => 'bg-danger-subtle text-danger border border-danger-subtle',
                                                default => 'bg-secondary-subtle text-secondary border border-secondary-subtle',
                                            };
                                        @endphp
                                        <span class="status-badge {{ $badgeClass }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection