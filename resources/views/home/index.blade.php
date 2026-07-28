@extends('layouts.app')

@section('content')
    <!-- CDN Bootstrap Icons (Disarankan ditaruh di file layouts/app.blade.php di dalam tag <head>) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Tag CSS/Style -->
    <style>
        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 16px;
            min-height: 85vh;
            /* Menjaga agar grid punya tinggi proporsional */
        }

        /* Common Styling untuk Card Grid */
        .grid-card {
            border-radius: 12px;
            padding: 24px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .grid-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* DIV 1: Hero Banner (Top) */
        .div1 {
            grid-column: span 5 / span 5;
            grid-row: span 3 / span 3;
            /* Background Gambar Gunung dengan Overlay Hitam Transparan agar teks terbaca */
            background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.7)),
                url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            align-items: flex-start;
        }

        /* DIV 2, 3, 4: Fitur / Kategori Alat */
        .div2 {
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background-color: #2e5a44;
            /* Forest Green */
        }

        .div3 {
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background-color: #1e293b;
            /* Dark Slate */
        }

        .div4 {
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background-color: #3b5249;
            /* Deep Sage */
        }

        /* DIV 5: Promo / Call To Action */
        .div5 {
            grid-column: span 2 / span 2;
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background: linear-gradient(135deg, #d97706, #b45309);
            /* Amber / Warm Orange */
        }

        /* Responsif untuk Layar HP */
        @media (max-width: 768px) {
            .parent {
                display: flex;
                flex-direction: column;
            }
        }
    </style>

    <!-- Tag HTML/Konten -->
    <div class="parent">

        <!-- DIV 1: HERO SECTION -->
        <div class="div1 grid-card">
            <span class="badge bg-warning text-dark mb-2 px-3 py-2 fw-bold" style="width: fit-content;">
                Sewa Alat Gunung Lengkap & Murah
            </span>
            <h1 class="display-4 fw-bold mb-3">Siap Menjelajah Puncak Impianmu?</h1>
            <p class="fs-5 text-light opacity-90 col-md-8 mb-4">
                Peralatan pendakian kualitas premium, selalu bersih, terawat, dan siap menemani setiap petualanganmu tanpa
                perlu beli mahal.
            </p>
            <a href="#katalog" class="btn btn-warning btn-lg fw-bold px-4 shadow">
                Lihat Katalog & Sewa Sekarang
            </a>
        </div>

        <!-- DIV 2: KATEGORI TENDA -->
        <div class="div2 grid-card text-center align-items-center">
<img width="48" height="48" src="https://img.icons8.com/ink/48/FFFFFF/tent-in-the-forest.png" alt="tent-in-the-forest"/>            {{-- <i class="bi bi-house fs-1 mb-2"></i> --}}
            <h5 class="fw-bold mb-1">Tenda Camping</h5>
            <p class="small text-light opacity-75 mb-0">Kapasitas 2-6 orang, waterproof & tahan angin.</p>
        </div>

        <!-- DIV 3: KATEGORI CARRIER -->
        <div class="div3 grid-card text-center align-items-center">
            <i class="bi bi-backpack fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Tas Carrier</h5>
            <p class="small text-light opacity-75 mb-0">Ukuran 45L - 80L, ergonomis & nyaman di punggung.</p>
        </div>

        <!-- DIV 4: KATEGORI ALAT MASAK -->
        <div class="div4 grid-card text-center align-items-center">
            <i class="bi bi-fire fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Alat Masak & Nesting</h5>
            <p class="small text-light opacity-75 mb-0">Kompor portable, flysheet, matras, & lighting.</p>
        </div>

        <!-- DIV 5: PAKET HEMAT / PROMO -->
        <div class="div5 grid-card justify-content-between">
            <div>
                <span class="badge bg-light text-dark fw-bold mb-2">Best Seller</span>
                <h4 class="fw-bold mb-2">Paket Pendaki Pemula <i class="bi bi-compass"></i></h4>
                <p class="small mb-0">
                    Dapatkan Tenda + 2 Carrier + Kompor + Matras dalam 1 paket hemat!
                </p>
            </div>
            <div class="mt-3">
                <a href="#" class="btn btn-light text-dark fw-bold btn-sm">
                    Cek Detail Paket &rarr;
                </a>
            </div>
        </div>

    </div>
@endsection
